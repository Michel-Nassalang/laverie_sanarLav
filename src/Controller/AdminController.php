<?php

namespace App\Controller;

use App\Repository\AbonnementRepository;
use App\Repository\CommandeRepository;
use App\Repository\ContactRepository;
use App\Repository\ReparationRepository;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(UserRepository $userRepository, CommandeRepository $commandeRepository, ReparationRepository $reparationRepository, TransactionRepository $transactionRepository, AbonnementRepository $abonnementRepository, ContactRepository $contactRepository): Response
    {
        $users = $userRepository->findAll();
        $commandes = $commandeRepository->findAll();
        $reparations = $reparationRepository->findAll();
        $transactions = $transactionRepository->findAll();
        $abonnements = $abonnementRepository->findAll();
        $userslimit = $userRepository->findBy([], null, 10);
        $contactslimit = $contactRepository->findBy([], null, 10);
        return $this->render('admin/index.html.twig', [
            'lusers'=> count($users),
            'lcommandes'=>count($commandes),
            'lreparations'=>count($reparations),
            'ltrans'=>count($transactions) + count($abonnements),
            'userslimit' => $userslimit,
            'contactslimit' => $contactslimit,
        ]);
    }
}
