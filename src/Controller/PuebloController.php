<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PuebloController extends AbstractController
{
    #[Route('/albanchez', name: 'app_albanchez')]
    public function albanchez(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Albanchez de Mágina',
            'asset'=> 'assets/images/pueblos/albanchez/pueblo-albanchez.webp',
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
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Bedmar y Garcíez',
            'asset'=> 'assets/images/pueblos/bedmar/pueblo-bedmar.webp'
        ]);
    }

    #[Route('/belmez', name: 'app_belmez')]
    public function belmez(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Bélmez de la Moraleda',
            'asset'=> 'assets/images/pueblos/belmez/pueblo-belmez.webp'
        ]);
    }

    #[Route('/jimena', name: 'app_jimena')]
    public function jimena(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Jimena',
            'asset'=> 'assets/images/pueblos/jimena/pueblo-jimena.webp'
        ]);
    }

    #[Route('/jodar', name: 'app_jodar')]
    public function jodar(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Jódar',
            'asset'=> 'assets/images/pueblos/jodar/pueblo-jodar.webp'
        ]);
    }

    #[Route('/pegalajar', name: 'app_pegalajar')]
    public function pegalajar(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Pegalajar',
            'asset'=> 'assets/images/pueblos/pegalajar/pueblo-pegalajar.webp'
        ]);
    }

    #[Route('/torres', name: 'app_torres')]
    public function torres(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Torres',
            'asset'=> 'assets/images/pueblos/torres/pueblo-torres.webp'
        ]);
    }

    #[Route('/huelma', name: 'app_huelma')]
    public function huelma(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Huelma',
            'asset'=> 'assets/images/pueblos/huelma/pueblo-huelma.webp'
        ]);
    }

    #[Route('/cambil', name: 'app_cambil')]
    public function cambil(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Cambil',
            'asset'=> 'assets/images/pueblos/cambil/pueblo-cambil.webp'
        ]);
    }


    // #[Route('/pueblos/{slug}', name: 'show_pueblo')]
    // public function show(string $slug): Response
    // {
    //     return $this->render('plantilla/pueblo.html.twig', [
    //         'slug' => $slug
    //     ]);
    //     // $routeName = $request->attributes->get('_route');
    //     // dd($routeName);
    //     // $routeParameters = $request->attributes->get('_route_params');

    //     // // use this to get all the available attributes (not only routing ones):
    //     // $allAttributes = $request->attributes->all();

    //     // return $this->render('pueblos/pueblo.html.twig');

    // }

}
