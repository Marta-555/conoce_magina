<?php

namespace App\Controller;

use DateTime;
use App\Entity\Ruta;
use App\Form\RutaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[IsGranted('ROLE_USER')]
class PerfilController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    #[Route('/perfil', name: 'app_perfil')]
    public function index(Request $request, SluggerInterface $slugger): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $userActive = $this->getUser()->getActive();

        if ($userActive != true){
            $this->addFlash('error', 'Verifica tu correo electrónico para poder acceder');

            return $this->render('perfil/index.html.twig', [
                'errorEmail' => 'error'
            ]);

        } else {

            $ruta = new Ruta();
            $usuario = $this->getUser();
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
                return $this->redirectToRoute('app_perfil');
            }

            return $this->render('perfil/index.html.twig', [
                'form' => $form->createView(),
                'nombre' => 'Nueva ruta'
            ]);
        }

    }
}
