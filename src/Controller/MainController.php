<?php

namespace App\Controller;

use App\Entity\Solicitudes;
use App\Form\ContactoFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $solicitud = new Solicitudes();
        $form = $this->createForm(ContactoFormType::class, $solicitud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $solicitud->setGestionado('0');
            $entityManager->persist($solicitud);
            $entityManager->flush();

            $this->addFlash('enviado', '¡Gracias por contactar con nosotros!');
            return $this->redirectToRoute('app_main');
        }

        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/location', name: 'app_location')]
    public function location(): Response
    {
        return $this->render('location/index.html.twig', [
            'controller_name' => 'LocationController',
        ]);
    }

    #[Route('/pueblos', name: 'app_pueblos')]
    public function pueblos(): Response
    {
        return $this->render('pueblos/index.html.twig');
    }

    #[Route('/parque-natural', name: 'app_parque')]
    public function parque(): Response
    {
        return $this->render('parque/index.html.twig');
    }
}
