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
            'asset'=> 'assets/images/pueblos/albanchez/Albanchez2.webp'
        ]);
    }

    #[Route('/bedmar', name: 'app_bedmar')]
    public function bedmar(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Bedmar y Garcíez',
            'asset'=> 'assets/images/pueblos/bedmar/bedmar.webp'
        ]);
    }

    #[Route('/belmez', name: 'app_belmez')]
    public function belmez(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Bélmez de la Moraleda',
            'asset'=> 'assets/images/pueblos/belmez/belmez.webp'
        ]);
    }

    #[Route('/jimena', name: 'app_jimena')]
    public function jimena(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Jimena',
            'asset'=> 'assets/images/pueblos/jimena/jimena.webp'
        ]);
    }

    #[Route('/jodar', name: 'app_jodar')]
    public function jodar(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Jódar',
            'asset'=> 'assets/images/pueblos/jodar/jodar.webp'
        ]);
    }

    #[Route('/pegalajar', name: 'app_pegalajar')]
    public function pegalajar(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Pegalajar',
            'asset'=> 'assets/images/pueblos/pegalajar/pegalajar.webp'
        ]);
    }

    #[Route('/torres', name: 'app_torres')]
    public function torres(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Torres',
            'asset'=> 'assets/images/pueblos/torres/torres.webp'
        ]);
    }

    #[Route('/huelma', name: 'app_huelma')]
    public function huelma(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Huelma',
            'asset'=> 'assets/images/pueblos/huelma/huelma-castillo.webp'
        ]);
    }

    #[Route('/cambil', name: 'app_cambil')]
    public function cambil(): Response
    {
        return $this->render('pueblos/pueblo.html.twig', [
            'pueblo' => 'Cambil',
            'asset'=> 'assets/images/pueblos/cambil/Cambil.webp'
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
