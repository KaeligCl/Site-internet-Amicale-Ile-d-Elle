<?php

namespace App\Controller\admin;

use App\Entity\LocationRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/demande')]
final class LocationRequestsController extends AbstractController
{
    #[Route('/{id}/traitee', name: 'app_admin_demande_traitee', methods: ['POST'])]
    public function traitee(LocationRequest $demande, Request $request, EntityManagerInterface $entityManager): Response
    {
        $token = (string) $request->request->get('_token', '');

        if (!$this->isCsrfTokenValid('demande-traitee-' . $demande->getId(), $token)) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $demande->setStatut(LocationRequest::STATUT_TRAITEE);
        $entityManager->flush();

        return $this->redirectToRoute('app_loged');
    }

    #[Route('/{id}/delete', name: 'app_admin_demande_delete', methods: ['POST'])]
    public function delete(LocationRequest $demande, Request $request, EntityManagerInterface $entityManager): Response
    {
        $token = (string) $request->request->get('_token', '');

        if (!$this->isCsrfTokenValid('demande-delete-' . $demande->getId(), $token)) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $entityManager->remove($demande);
        $entityManager->flush();

        return $this->redirectToRoute('app_loged');
    }
}
