<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

#[IsGranted('ROLE_USER')]
class PerfilController extends AbstractController
{
    #[Route('/perfil', name: 'app_perfil')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $userActive = $this->getUser()->getActive();

        if ($userActive != true){

            $this->addFlash('error', 'Verifica tu correo electrónico para poder acceder');

            return $this->render('perfil/index.html.twig', [
                'errorEmail' => 'error',
                'controller_name' => 'PerfilController',
            ]);
        }

        return $this->render('perfil/index.html.twig', [
            'controller_name' => 'PerfilController',
        ]);
    }
}
