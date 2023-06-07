<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    #[Route('/compte', name: 'app_compte')]
    public function index(): Response
    {
        /** @var UserInterface $user */
        $user = $this->getUser();
        $email = $user->getEmail();
        return $this->render('compte/index.html.twig', [
            'controller_name' => 'CompteController',
        ]);
    }
}
