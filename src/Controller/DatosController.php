<?php

namespace App\Controller;

use App\Entity\Pub;
use App\Entity\Ruta;
use App\Entity\Municipio;
use App\Entity\Alojamiento;
use App\Entity\Restaurante;
use App\Entity\PuntoInteres;
use App\Entity\VisitaGuiada;
use App\Entity\ActividadOcio;
use App\Entity\EmpresaTurismo;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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


    #[Route('/visitas', name: 'app_vGuiada')]
    public function ajaxvGuiada(Request $request, ManagerRegistry $doctrine)
    {
        $visitas = $doctrine->getRepository(VisitaGuiada::class)->findAll();
        $municipios = $doctrine->getRepository(Municipio::class)->findAll();
        $empresas = $doctrine->getRepository(EmpresaTurismo::class)->findAll();

        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {
            $jsonData = array();

            $idx = 0;
            foreach($visitas as $visita) {
                $temp = array(
                   'nombre' => $visita->getNombre(),
                   'descripcion' => $visita->getDescripcion(),
                    'precio' => $visita->getPrecio(),
                    'image' => $visita->getImageUrl(),
                    'empresa_id' => $visita->getEmpresa()->getId(),
                    'municipio_id' => $visita->getMunicipio()->getId(),
                );

                foreach($municipios as $municipio){
                    if($temp['municipio_id'] == $municipio->getId()){
                        $temp += ['muni_nombre' => $municipio->getNombre()];
                    }
                }

                foreach($empresas as $empresa){
                    if($temp['empresa_id'] == $empresa->getId()){
                        $temp += ['empresa_nombre' => $empresa->getNombre()];
                        $temp += ['empresa_tfno1' => $empresa->getTelefono1()];
                        $temp += ['empresa_tfno2' => $empresa->getTelefono2()];
                        $temp += ['empresa_web' => $empresa->getPaginaWeb()];
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
                'titulo' => 'Visitas Guiadas',
                'image' => 'assets/images/visitaGuiada.webp'
            ]);
        }

    }

    #[Route('/turismo-activo', name: 'app_tActivo')]
    public function ajaxtActivo(Request $request, ManagerRegistry $doctrine)
    {
        $actividades = $doctrine->getRepository(ActividadOcio::class)->findAll();
        $municipios = $doctrine->getRepository(Municipio::class)->findAll();
        $empresas = $doctrine->getRepository(EmpresaTurismo::class)->findAll();

        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {
            $jsonData = array();

            $idx = 0;
            foreach($actividades as $actividad) {
                $temp = array(
                   'nombre' => $actividad->getNombre(),
                   'descripcion' => $actividad->getDescripcion(),
                    'precio' => $actividad->getPrecio(),
                    'image' => $actividad->getImageUrl(),
                    'empresa_id' => $actividad->getEmpresa()->getId(),
                    'municipio_id' => $actividad->getMunicipio()->getId(),
                );

                foreach($municipios as $municipio){
                    if($temp['municipio_id'] == $municipio->getId()){
                        $temp += ['muni_nombre' => $municipio->getNombre()];
                    }
                }

                foreach($empresas as $empresa){
                    if($temp['empresa_id'] == $empresa->getId()){
                        $temp += ['empresa_nombre' => $empresa->getNombre()];
                        $temp += ['empresa_tfno1' => $empresa->getTelefono1()];
                        $temp += ['empresa_tfno2' => $empresa->getTelefono2()];
                        $temp += ['empresa_web' => $empresa->getPaginaWeb()];
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
                'titulo' => 'Turismo activo',
                'image' => 'assets/images/turismoActivo.webp'
            ]);
        }

    }


    #[Route('/rutas', name: 'app_rutas')]
    public function ajaxRutas(Request $request, ManagerRegistry $doctrine)
    {
        $rutas = $doctrine->getRepository(Ruta::class)->findAll();
        $puntosInt = $doctrine->getRepository(PuntoInteres::class)->findAll();
        $municipios = $doctrine->getRepository(Municipio::class)->findAll();

        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {
            $jsonData = array();

            $idx = 0;
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
                    'user' => $ruta->getUser()->getName(),
                );

                foreach($puntosInt as $punto){
                    if($temp['id'] == $punto->getRuta()->getId()){
                        $pInteres = array();
                        $pInteres += ['p_id' => $punto->getRuta()->getId()];
                        $pInteres += ['p_titulo' => $punto->getTitulo()];
                        $pInteres += ['p_descrip' => $punto->getDescripcion()];
                        $pInteres += ['p_coord' => $punto->getCoordenadas()];
                        $pInteres += ['p_foto' => $punto->getFotoUrl()];
                        $pInteres += ['p_user' => $punto->getUser()->getName()];
                        $temp += ['puntoInteres' => $pInteres];
                    } else {
                        $temp += ['puntoInteres' => "" ];
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
                'titulo' => 'Rutas Libres',
                'image' => 'assets/images/rutas.webp'
            ]);
        }

    }

}
