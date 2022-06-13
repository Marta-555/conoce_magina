<?php

namespace App\Controller;

use App\Entity\Alojamiento;
use App\Entity\Municipio;
use App\Entity\Pub;
use App\Entity\Restaurante;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DatosController extends AbstractController
{
    #[Route('/alojamiento', name: 'app_alojamientos')]
    public function ajaxAlojamiento(Request $request, ManagerRegistry $doctrine)
    {
        $alojamientos = $doctrine->getRepository(Alojamiento::class)->findAll();
        $municipios = $doctrine->getRepository(Municipio::class)->findAll();

        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {
            $jsonData = array();

            $idx = 0;
            foreach($alojamientos as $alojamiento) {
                $temp = array(
                   'nombre' => $alojamiento->getNombre(),
                   'direccion' => $alojamiento->getDireccion(),
                    'tlfno1' => $alojamiento->getTelefono1(),
                    'tlfno2' => $alojamiento->getTelefono2(),
                    'web' => $alojamiento->getPaginaWeb(),
                    'image' => $alojamiento->getImageUrl(),
                    'municipio_id' => $alojamiento->getMunicipio()->getId(),
                );

                foreach($municipios as $municipio){
                    if($temp['municipio_id'] == $municipio->getId()){
                        $temp += ['muni_nombre' => $municipio->getNombre()];
                    }
                }
                $jsonData[$idx++] = $temp;
            }
            $cont = 0;
            $lista = array();
            foreach($municipios as $municipio) {
                $muni = array(
                    'municipio' => $municipio->getNombre(),
                );
                $lista[$cont++] = $muni;
            }
            $jsonData[$idx++] = $lista;
            return new JsonResponse($jsonData);
        } else {
            return $this->render('datos/index.html.twig', [
                'titulo' => 'Alojamientos',
                'image' => 'assets/images/alojamiento.webp'
            ]);
        }

    }


    #[Route('/restaurantes', name: 'app_restaurantes')]
    public function ajaxRestaurante(Request $request, ManagerRegistry $doctrine)
    {
        $restaurantes = $doctrine->getRepository(Restaurante::class)->findAll();
        $municipios = $doctrine->getRepository(Municipio::class)->findAll();

        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {
            $jsonData = array();

            $idx = 0;
            foreach($restaurantes as $restaurante) {
                $temp = array(
                   'nombre' => $restaurante->getNombre(),
                   'direccion' => $restaurante->getDireccion(),
                    'tlfno1' => $restaurante->getTelefono1(),
                    'tlfno2' => $restaurante->getTelefono2(),
                    'web' => $restaurante->getPaginaWeb(),
                    'image' => $restaurante->getImageUrl(),
                    'municipio_id' => $restaurante->getMunicipio()->getId(),
                );

                foreach($municipios as $municipio){
                    if($temp['municipio_id'] == $municipio->getId()){
                        $temp += ['muni_nombre' => $municipio->getNombre()];
                    }
                }
                $jsonData[$idx++] = $temp;
            }
            $cont = 0;
            $lista = array();
            foreach($municipios as $municipio) {
                $muni = array(
                    'municipio' => $municipio->getNombre(),
                );
                $lista[$cont++] = $muni;
            }
            $jsonData[$idx++] = $lista;
            return new JsonResponse($jsonData);
        } else {
            return $this->render('datos/index.html.twig', [
                'titulo' => 'Restaurantes',
                'image' => 'assets/images/restaurante.webp'
            ]);
        }

    }

    #[Route('/ocio-nocturno', name: 'app_pub')]
    public function ajaxPub(Request $request, ManagerRegistry $doctrine)
    {
        $pubs = $doctrine->getRepository(Pub::class)->findAll();
        $municipios = $doctrine->getRepository(Municipio::class)->findAll();

        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {
            $jsonData = array();

            $idx = 0;
            foreach($pubs as $pub) {
                $temp = array(
                   'nombre' => $pub->getNombre(),
                   'direccion' => $pub->getDireccion(),
                    'tlfno1' => $pub->getTelefono1(),
                    'tlfno2' => $pub->getTelefono2(),
                    'web' => $pub->getPaginaWeb(),
                    'image' => $pub->getImageUrl(),
                    'municipio_id' => $pub->getMunicipio()->getId(),
                );

                foreach($municipios as $municipio){
                    if($temp['municipio_id'] == $municipio->getId()){
                        $temp += ['muni_nombre' => $municipio->getNombre()];
                    }
                }
                $jsonData[$idx++] = $temp;
            }
            $cont = 0;
            $lista = array();
            foreach($municipios as $municipio) {
                $muni = array(
                    'municipio' => $municipio->getNombre(),
                );
                $lista[$cont++] = $muni;
            }
            $jsonData[$idx++] = $lista;
            return new JsonResponse($jsonData);
        } else {
            return $this->render('datos/index.html.twig', [
                'titulo' => 'Ocio Nocturno',
                'image' => 'assets/images/ocioNocturno.webp'
            ]);
        }

    }


    // #[Route('/alojamientos', name: 'app_alojamientos')]
    // public function index(): Response
    // {
    //     return $this->render('datos/index.html.twig');
    // }
}