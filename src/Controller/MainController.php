<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Repository\AnnonceRepository;
use App\Repository\MarqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(AnnonceRepository $annonceRepository,  MarqueRepository $marqueRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'annonces' => $annonceRepository->findAll(),
            'marques' => $marqueRepository->findAll()
        ]);
    }
    #[Route('/tab/{id}', name: 'tab')]
    public function tab(Marque $marque, AnnonceRepository $annonceRepository, MarqueRepository $marqueRepository): Response
    {
        return $this->render('main/marque.html.twig', [
            'marq' => $marque,
            'annonces' => $annonceRepository->findAll(),
            'marques' => $marqueRepository->findAll(),
        ]);
    }
}
