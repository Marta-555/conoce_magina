<?php

namespace App\Controller;

use App\Entity\ActividadOcio;
use App\Repository\ActividadOcioRepository;
use App\Repository\AlojamientoRepository;
use Exception;
use App\Repository\MunicipioRepository;
use App\Repository\PubRepository;
use App\Repository\RestauranteRepository;
use App\Repository\VisitaGuiadaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PuebloController extends AbstractController
{
    private $municipioRepository;
    private $alojamientoRepository;
    private $restauranteRepository;
    private $ocioRepository;
    private $visitagRepository;
    private $pubRepository;

    public function __construct(MunicipioRepository $municipioRepository, AlojamientoRepository $alojamientoRepository, RestauranteRepository $restauranteRepository, ActividadOcioRepository $ocioRepository, VisitaGuiadaRepository $visitagRepository, PubRepository $pubRepository)
    {
        $this->municipioRepository = $municipioRepository;
        $this->alojamientoRepository = $alojamientoRepository;
        $this->restauranteRepository = $restauranteRepository;
        $this->ocioRepository = $ocioRepository;
        $this->visitagRepository = $visitagRepository;
        $this->pubRepository = $pubRepository;
    }

    public function informacion(string $nombre)
    {
        $datos = [];

        $municipio = $this->municipioRepository->findMunicipio($nombre);
        $id = $municipio->getId();

        $alojamiento = $this->alojamientoRepository->findAlojamiento($id);
        $restaurante = $this->restauranteRepository->finRestaurante($id);
        $pub = $this->pubRepository->findPub($id);
        $actOcio =$this->ocioRepository->findActOcio($id);
        $visitaG = $this->visitagRepository->findVisitaG($id);

        $datos = [$municipio, $alojamiento, $restaurante, $pub, $actOcio, $visitaG];
        return $datos;
    }

    #[Route('/albanchez', name: 'app_albanchez')]
    public function albanchez(): Response
    {
        $nombre = 'Albanchez de Mágina';
        $datos = $this->informacion($nombre);

        return $this->render('pueblos/pueblo.html.twig', [
            'municipio' => $datos[0],
            'asset'=> 'assets/images/pueblos/albanchez/pueblo-albanchez.webp',
            'alojamiento' => $datos[1],
            'restaurante' => $datos[2],
            'pub' => $datos[3],
            'ocio' => $datos[4],
            'visitaG' => $datos[5],
            'galeria' => [
                'titulo1' => 'Castillo de Albanchez de mágina',
                'imagen1' => 'assets/images/pueblos/albanchez/castillo2.webp',
                'titulo2' => 'Calle de Albanchez de Mágina',
                'imagen2' => 'assets/images/pueblos/albanchez/escaleras.webp',
                'titulo3' => 'Vistas desde el castillo de Albanchez',
                'imagen3' => 'assets/images/pueblos/albanchez/castillo.webp',
                'titulo4' => 'Albanchez de Mágina',
                'imagen4' => 'assets/images/pueblos/albanchez/pueblo.webp',
                'titulo5' => 'Paraje de Hútar',
                'imagen5' => 'assets/images/pueblos/albanchez/hutar4.webp',
                'titulo6' => 'Paraje de Hútar',
                'imagen6' => 'assets/images/pueblos/albanchez/hutar2.webp',
            ]
        ]);
    }

    #[Route('/bedmar', name: 'app_bedmar')]
    public function bedmar(): Response
    {
        $nombre = 'Bedmar y Garcíez';
        $datos = $this->informacion($nombre);

        return $this->render('pueblos/pueblo.html.twig', [
            'municipio' => $datos[0],
            'asset'=> 'assets/images/pueblos/bedmar/pueblo-bedmar.webp',
            'alojamiento' => $datos[1],
            'restaurante' => $datos[2],
            'pub' => $datos[3],
            'ocio' => $datos[4],
            'visitaG' => $datos[5],
            'galeria' => [
                // 'titulo1' => 'Castillo de Albanchez de mágina',
                // 'imagen1' => 'assets/images/pueblos/albanchez/castillo2.webp',
                // 'titulo2' => 'Calle de Albanchez de Mágina',
                // 'imagen2' => 'assets/images/pueblos/albanchez/escaleras.webp',
                // 'titulo3' => 'Vistas desde el castillo de Albanchez',
                // 'imagen3' => 'assets/images/pueblos/albanchez/castillo.webp',
                // 'titulo4' => 'Albanchez de Mágina',
                // 'imagen4' => 'assets/images/pueblos/albanchez/pueblo.webp',
                // 'titulo5' => 'Paraje de Hútar',
                // 'imagen5' => 'assets/images/pueblos/albanchez/hutar4.webp',
                // 'titulo6' => 'Paraje de Hútar',
                // 'imagen6' => 'assets/images/pueblos/albanchez/hutar2.webp',
            ]
        ]);
    }

    #[Route('/belmez', name: 'app_belmez')]
    public function belmez(): Response
    {
        $nombre = 'Bélmez de la Moraleda';
        $datos = $this->informacion($nombre);

        return $this->render('pueblos/pueblo.html.twig', [
            'municipio' => $datos[0],
            'asset'=> 'assets/images/pueblos/belmez/pueblo-belmez.webp',
            'alojamiento' => $datos[1],
            'restaurante' => $datos[2],
            'pub' => $datos[3],
            'ocio' => $datos[4],
            'visitaG' => $datos[5],
            'galeria' => [
                // 'titulo1' => 'Castillo de Albanchez de mágina',
                // 'imagen1' => 'assets/images/pueblos/albanchez/castillo2.webp',
                // 'titulo2' => 'Calle de Albanchez de Mágina',
                // 'imagen2' => 'assets/images/pueblos/albanchez/escaleras.webp',
                // 'titulo3' => 'Vistas desde el castillo de Albanchez',
                // 'imagen3' => 'assets/images/pueblos/albanchez/castillo.webp',
                // 'titulo4' => 'Albanchez de Mágina',
                // 'imagen4' => 'assets/images/pueblos/albanchez/pueblo.webp',
                // 'titulo5' => 'Paraje de Hútar',
                // 'imagen5' => 'assets/images/pueblos/albanchez/hutar4.webp',
                // 'titulo6' => 'Paraje de Hútar',
                // 'imagen6' => 'assets/images/pueblos/albanchez/hutar2.webp',
            ]
        ]);
    }

    #[Route('/jimena', name: 'app_jimena')]
    public function jimena(): Response
    {
        $nombre = 'Jimena';
        $datos = $this->informacion($nombre);

        return $this->render('pueblos/pueblo.html.twig', [
            'municipio' => $datos[0],
            'asset'=> 'assets/images/pueblos/jimena/pueblo-jimena.webp',
            'alojamiento' => $datos[1],
            'restaurante' => $datos[2],
            'pub' => $datos[3],
            'ocio' => $datos[4],
            'visitaG' => $datos[5],
            'galeria' => [
                // 'titulo1' => 'Castillo de Albanchez de mágina',
                // 'imagen1' => 'assets/images/pueblos/albanchez/castillo2.webp',
                // 'titulo2' => 'Calle de Albanchez de Mágina',
                // 'imagen2' => 'assets/images/pueblos/albanchez/escaleras.webp',
                // 'titulo3' => 'Vistas desde el castillo de Albanchez',
                // 'imagen3' => 'assets/images/pueblos/albanchez/castillo.webp',
                // 'titulo4' => 'Albanchez de Mágina',
                // 'imagen4' => 'assets/images/pueblos/albanchez/pueblo.webp',
                // 'titulo5' => 'Paraje de Hútar',
                // 'imagen5' => 'assets/images/pueblos/albanchez/hutar4.webp',
                // 'titulo6' => 'Paraje de Hútar',
                // 'imagen6' => 'assets/images/pueblos/albanchez/hutar2.webp',
            ]
        ]);
    }

    #[Route('/jodar', name: 'app_jodar')]
    public function jodar(): Response
    {
        $nombre = 'Jódar';
        $datos = $this->informacion($nombre);

        return $this->render('pueblos/pueblo.html.twig', [
            'municipio' => $datos[0],
            'asset'=> 'assets/images/pueblos/jodar/pueblo-jodar.webp',
            'alojamiento' => $datos[1],
            'restaurante' => $datos[2],
            'pub' => $datos[3],
            'ocio' => $datos[4],
            'visitaG' => $datos[5],
            'galeria' => [
                // 'titulo1' => 'Castillo de Albanchez de mágina',
                // 'imagen1' => 'assets/images/pueblos/albanchez/castillo2.webp',
                // 'titulo2' => 'Calle de Albanchez de Mágina',
                // 'imagen2' => 'assets/images/pueblos/albanchez/escaleras.webp',
                // 'titulo3' => 'Vistas desde el castillo de Albanchez',
                // 'imagen3' => 'assets/images/pueblos/albanchez/castillo.webp',
                // 'titulo4' => 'Albanchez de Mágina',
                // 'imagen4' => 'assets/images/pueblos/albanchez/pueblo.webp',
                // 'titulo5' => 'Paraje de Hútar',
                // 'imagen5' => 'assets/images/pueblos/albanchez/hutar4.webp',
                // 'titulo6' => 'Paraje de Hútar',
                // 'imagen6' => 'assets/images/pueblos/albanchez/hutar2.webp',
            ]
        ]);
    }

    #[Route('/pegalajar', name: 'app_pegalajar')]
    public function pegalajar(): Response
    {
        $nombre = 'Pegalajar';
        $datos = $this->informacion($nombre);

        return $this->render('pueblos/pueblo.html.twig', [
            'municipio' => $datos[0],
            'asset'=> 'assets/images/pueblos/pegalajar/pueblo-pegalajar.webp',
            'alojamiento' => $datos[1],
            'restaurante' => $datos[2],
            'pub' => $datos[3],
            'ocio' => $datos[4],
            'visitaG' => $datos[5],
            'galeria' => [
                // 'titulo1' => 'Castillo de Albanchez de mágina',
                // 'imagen1' => 'assets/images/pueblos/albanchez/castillo2.webp',
                // 'titulo2' => 'Calle de Albanchez de Mágina',
                // 'imagen2' => 'assets/images/pueblos/albanchez/escaleras.webp',
                // 'titulo3' => 'Vistas desde el castillo de Albanchez',
                // 'imagen3' => 'assets/images/pueblos/albanchez/castillo.webp',
                // 'titulo4' => 'Albanchez de Mágina',
                // 'imagen4' => 'assets/images/pueblos/albanchez/pueblo.webp',
                // 'titulo5' => 'Paraje de Hútar',
                // 'imagen5' => 'assets/images/pueblos/albanchez/hutar4.webp',
                // 'titulo6' => 'Paraje de Hútar',
                // 'imagen6' => 'assets/images/pueblos/albanchez/hutar2.webp',
            ]
        ]);
    }

    #[Route('/torres', name: 'app_torres')]
    public function torres(): Response
    {
        $nombre = 'Torres';
        $datos = $this->informacion($nombre);

        return $this->render('pueblos/pueblo.html.twig', [
            'municipio' => $datos[0],
            'asset'=> 'assets/images/pueblos/torres/pueblo-torres.webp',
            'alojamiento' => $datos[1],
            'restaurante' => $datos[2],
            'pub' => $datos[3],
            'ocio' => $datos[4],
            'visitaG' => $datos[5],
            'galeria' => [
                // 'titulo1' => 'Castillo de Albanchez de mágina',
                // 'imagen1' => 'assets/images/pueblos/albanchez/castillo2.webp',
                // 'titulo2' => 'Calle de Albanchez de Mágina',
                // 'imagen2' => 'assets/images/pueblos/albanchez/escaleras.webp',
                // 'titulo3' => 'Vistas desde el castillo de Albanchez',
                // 'imagen3' => 'assets/images/pueblos/albanchez/castillo.webp',
                // 'titulo4' => 'Albanchez de Mágina',
                // 'imagen4' => 'assets/images/pueblos/albanchez/pueblo.webp',
                // 'titulo5' => 'Paraje de Hútar',
                // 'imagen5' => 'assets/images/pueblos/albanchez/hutar4.webp',
                // 'titulo6' => 'Paraje de Hútar',
                // 'imagen6' => 'assets/images/pueblos/albanchez/hutar2.webp',
            ]
        ]);
    }

    #[Route('/huelma', name: 'app_huelma')]
    public function huelma(): Response
    {
        $nombre = 'Huelma';
        $datos = $this->informacion($nombre);

        return $this->render('pueblos/pueblo.html.twig', [
            'municipio' => $datos[0],
            'asset'=> 'assets/images/pueblos/huelma/pueblo-huelma.webp',
            'alojamiento' => $datos[1],
            'restaurante' => $datos[2],
            'pub' => $datos[3],
            'ocio' => $datos[4],
            'visitaG' => $datos[5],
            'galeria' => [
                // 'titulo1' => 'Castillo de Albanchez de mágina',
                // 'imagen1' => 'assets/images/pueblos/albanchez/castillo2.webp',
                // 'titulo2' => 'Calle de Albanchez de Mágina',
                // 'imagen2' => 'assets/images/pueblos/albanchez/escaleras.webp',
                // 'titulo3' => 'Vistas desde el castillo de Albanchez',
                // 'imagen3' => 'assets/images/pueblos/albanchez/castillo.webp',
                // 'titulo4' => 'Albanchez de Mágina',
                // 'imagen4' => 'assets/images/pueblos/albanchez/pueblo.webp',
                // 'titulo5' => 'Paraje de Hútar',
                // 'imagen5' => 'assets/images/pueblos/albanchez/hutar4.webp',
                // 'titulo6' => 'Paraje de Hútar',
                // 'imagen6' => 'assets/images/pueblos/albanchez/hutar2.webp',
            ]
        ]);
    }

    #[Route('/cambil', name: 'app_cambil')]
    public function cambil(): Response
    {
        $nombre = 'Cambil';
        $datos = $this->informacion($nombre);

        return $this->render('pueblos/pueblo.html.twig', [
            'municipio' => $datos[0],
            'asset'=> 'assets/images/pueblos/cambil/pueblo-cambil.webp',
            'alojamiento' => $datos[1],
            'restaurante' => $datos[2],
            'pub' => $datos[3],
            'ocio' => $datos[4],
            'visitaG' => $datos[5],
            'galeria' => [
                // 'titulo1' => 'Castillo de Albanchez de mágina',
                // 'imagen1' => 'assets/images/pueblos/albanchez/castillo2.webp',
                // 'titulo2' => 'Calle de Albanchez de Mágina',
                // 'imagen2' => 'assets/images/pueblos/albanchez/escaleras.webp',
                // 'titulo3' => 'Vistas desde el castillo de Albanchez',
                // 'imagen3' => 'assets/images/pueblos/albanchez/castillo.webp',
                // 'titulo4' => 'Albanchez de Mágina',
                // 'imagen4' => 'assets/images/pueblos/albanchez/pueblo.webp',
                // 'titulo5' => 'Paraje de Hútar',
                // 'imagen5' => 'assets/images/pueblos/albanchez/hutar4.webp',
                // 'titulo6' => 'Paraje de Hútar',
                // 'imagen6' => 'assets/images/pueblos/albanchez/hutar2.webp',
            ]
        ]);
    }


}
