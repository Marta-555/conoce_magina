<?php

namespace App\Controller;

use DateTime;
use App\Entity\Ruta;
use App\Form\RutaType;
use App\Entity\Municipio;
use App\Entity\PuntoInteres;
use App\Entity\TipoRuta;
use App\Form\PuntoInteresFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[IsGranted('ROLE_USER')]
class PerfilController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    #[Route('/perfil-nuevaRuta', name: 'app_newRuta')]
    public function nuevaRuta(Request $request, SluggerInterface $slugger): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $userActive = $this->getUser()->getActive();

        if ($userActive != true){
            $this->addFlash('error', 'Verifica tu correo electrónico para poder acceder');

            return $this->render('perfil/newRuta.html.twig', [
                'errorEmail' => 'error'
            ]);

        } else {

            $usuario = $this->getUser();

            $ruta = new Ruta();
            $form = $this->createForm(RutaType::class, $ruta);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $now = new DateTime();
                $ruta->setFechaPublicacion($now);
                $ruta->setUser($usuario);
                $image = $form->get('image')->getData();

                if($image) {
                    $originalImage = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeImage = $slugger->slug($originalImage);
                    $newImage = $safeImage.'-'.uniqid().'.'.$image->guessExtension();

                    try {
                        $image->move(
                            $this->getParameter('rutas_directory'),
                            $newImage
                        );
                    } catch (FileException $e) {
                        return $e->getMessage();
                    }
                    $ruta->setImage($newImage);
                }

                $this->em->persist($ruta);
                $this->em->flush();
                return $this->redirectToRoute('app_newRuta');
            }

            $puntoI = new PuntoInteres();
            $form2 = $this->createForm(PuntoInteresFormType::class, $puntoI);
            $form2->handleRequest($request);

            if ($form2->isSubmitted() && $form2->isValid()) {
                $now = new DateTime();
                $puntoI->setFechaPublicacion($now);
                $puntoI->setUser($usuario);
                $foto = $form2->get('foto')->getData();

                if($foto) {
                    $originalFoto = pathinfo($foto->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFoto = $slugger->slug($originalFoto);
                    $newFoto = $safeFoto.'-'.uniqid().'.'.$foto->guessExtension();

                    try {
                        $foto->move(
                            $this->getParameter('puntoInt_directory'),
                            $newFoto
                        );
                    } catch (FileException $e) {
                        return $e->getMessage();
                    }
                    $puntoI->setFoto($newFoto);
                }
                $this->em->persist($puntoI);
                $this->em->flush();

                return $this->redirectToRoute('app_newRuta');
            }

            return $this->render('perfil/newRuta.html.twig', [
                'form' => $form->createView(),
                'form2' => $form2->createView(),
                'nombre' => 'Ayúdanos a conocer nuevas rutas y puntos de interés'
            ]);
        }

    }

    #[Route('/perfil-listado', name: 'app_listado')]
    public function listado(Request $request, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $userActive = $this->getUser()->getActive();

        if ($userActive != true){
            $this->addFlash('error', 'Verifica tu correo electrónico para poder acceder');

            return $this->render('perfil/listado.html.twig', [
                'errorEmail' => 'error'
            ]);

        } else {

            $usuario = $this->getUser();
            $rutas = $doctrine->getRepository(Ruta::class)->findUser($usuario);
            $puntosInt = $doctrine->getRepository(PuntoInteres::class)->findAll();

            if($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {
                $jsonData['data'] = array();

                // $idx = 0;
                foreach($rutas as $ruta) {
                    $temp = array(
                        'id' => $ruta->getId(),
                        'titulo' => $ruta->getTitulo(),
                        'descripcion' => $ruta->getDescripcion(),
                        'dificultad' => $ruta->getDificultad(),
                        'longitud' => $ruta->getLongitud(),
                        'tiempo' => $ruta->getTiempo(),
                        'mapa' => $ruta->getMapa(),
                        'desnivel' => $ruta->getDesnivel(),
                        'image' => $ruta->getImageUrl(),
                        'municipio' => $ruta->getMunicipio()->getNombre(),
                        'tipoRuta' => $ruta->getTipoRuta()->getDescripcion(),
                        'fecha_publicacion' => $ruta->getFechaPublicacion(),
                        'user' => $ruta->getUser()->getId(),
                    );

                    foreach($puntosInt as $punto){
                        if($temp['id'] == $punto->getRuta()->getId() && $temp['user'] == $punto->getUser()->getId()){
                            $temp += ['puntoInteres' => $punto->getTitulo()];
                        } else {
                            $temp += ['puntoInteres' => "" ];
                        }
                    }
                    $jsonData['data'] += $temp;
                }
                return new JsonResponse($jsonData);

            } else {
                return $this->render('perfil/listado.html.twig', [
                    'nombre' => 'Rutas publicadas'
                ]);
            }

        }
    }
}
