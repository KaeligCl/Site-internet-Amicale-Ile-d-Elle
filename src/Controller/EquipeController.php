<?php

namespace App\Controller;

use App\Repository\EquipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route; // <-- "Attribute" au lieu de "Annotation"

class EquipeController extends AbstractController
{
    #[Route('/equipe', name: 'app_equipe')]
    public function index(EquipeRepository $equipeRepository): Response
    {
        return $this->render('equipe/index.html.twig', [
            'controller_name' => 'EquipeController',
            'membres' => $equipeRepository->findAll(),
        ]);
    }
}