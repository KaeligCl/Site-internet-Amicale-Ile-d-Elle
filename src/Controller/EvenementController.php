<?php

namespace App\Controller;

use App\Repository\EvenementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'app_evenement')]
    public function index(EvenementsRepository $evenementsRepository): Response
    {
        $now = new \DateTime();

        // Récupère les événements futurs (du plus proche au plus éloigné)
        $evenementsAvenir = $evenementsRepository->createQueryBuilder('e')
            ->where('e.dateDebut >= :now')
            ->setParameter('now', $now)
            ->orderBy('e.dateDebut', 'ASC')
            ->getQuery()
            ->getResult();

        // Récupère les événements passés (du plus récent au plus ancien)
        $evenementsPasses = $evenementsRepository->createQueryBuilder('e')
            ->where('e.dateDebut < :now')
            ->setParameter('now', $now)
            ->orderBy('e.dateDebut', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('evenement/index.html.twig', [
            'evenementsAvenir' => $evenementsAvenir,
            'evenementsPasses' => $evenementsPasses,
        ]);
    }
}