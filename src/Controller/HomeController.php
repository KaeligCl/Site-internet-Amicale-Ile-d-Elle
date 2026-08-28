<?php

namespace App\Controller;

use App\Repository\EquipeRepository;
use App\Repository\EvenementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
#[Route('/', name: 'app_home')]
    public function index(
        EquipeRepository $equipeRepository,
        EvenementsRepository $evenementsRepository
    ): Response {
        // 1. Récupération des comptages en BDD
        $totalBenevoles = $equipeRepository->count([]);
        
        // Si la méthode countEventsThisYear() est prête dans ton repository, utilise-la, 
        // sinon utilise $evenementsRepository->count([]) pour l'instant :
        $totalEventsThisYear = $evenementsRepository->count([]);

        // 2. Envoi des variables au template Twig
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'nb_benevoles' => $totalBenevoles,
            'nb_evenements' => $totalEventsThisYear,
        ]);
    }
}
