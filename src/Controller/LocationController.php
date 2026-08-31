<?php

namespace App\Controller;

use App\Entity\Equipement;
use App\Entity\LocationRequest;
use App\Form\LocationRequestType;
use App\Repository\EquipementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route; // Attention : Attribute pour Symfony 6/7

class LocationController extends AbstractController
{
    #[Route('/location', name: 'app_location')]
    public function index(
        EquipementRepository $equipementRepository,
        Request $request
    ): Response {
        $form = $this->createForm(LocationRequestType::class, new LocationRequest(), [
            'action' => $this->generateUrl('app_location_reserver'),
            'method' => 'POST',
        ]);

        return $this->render('location/index.html.twig', [
            'controller_name' => 'LocationController',
            'equipements' => $equipementRepository->findBy(['encoreDisponible' => true]),
            'reservationForm' => $form->createView(),
            'reservation_sent' => $request->query->getBoolean('sent'),
            'reservation_error' => $request->query->get('erreur'),
        ]);
    }

    #[Route('/location/reserver', name: 'app_location_reserver', methods: ['POST'])]
    public function reserver(
        Request $request,
        EntityManagerInterface $entityManager,
        EquipementRepository $equipementRepository
    ): Response {
        $locationRequest = new LocationRequest();
        $form = $this->createForm(LocationRequestType::class, $locationRequest, [
            'action' => $this->generateUrl('app_location_reserver'),
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->redirectToRoute('app_location', ['erreur' => 'formulaire']);
        }

        // Rattachement du matériel choisi dans la popup (champ caché rempli par le JS)
        $equipement = $equipementRepository->find(
            (int) $request->request->get('equipement_id', 0)
        );

        if (!$equipement instanceof Equipement) {
            return $this->redirectToRoute('app_location', ['erreur' => 'materiel']);
        }

        $locationRequest->setEquipement($equipement);
        $entityManager->persist($locationRequest);
        $entityManager->flush();

        return $this->redirectToRoute('app_location', ['sent' => 1]);
    }
}