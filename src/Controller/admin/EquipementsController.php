<?php

namespace App\Controller\admin;

use App\Entity\Equipement;
use App\Form\EquipementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/equipement')]
final class EquipementsController extends AbstractController
{
    #[Route('/new', name: 'app_admin_equipement_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $equipement = new Equipement();
        $form = $this->createForm(EquipementType::class, $equipement, [
            'action' => $this->generateUrl('app_admin_equipement_new'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($equipement);
            $entityManager->flush();

            return $this->redirectToRoute('app_loged');
        }

        return $this->render('admin/form.html.twig', [
            'form' => $form,
            'titrePage' => 'Ajouter une location',
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_equipement_edit', methods: ['POST'])]
    public function edit(Equipement $equipement, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EquipementType::class, $equipement, [
            'action' => $this->generateUrl('app_admin_equipement_edit', ['id' => $equipement->getId()]),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_loged');
        }

        return $this->render('admin/form.html.twig', [
            'form' => $form,
            'titrePage' => 'Modifier une location',
        ]);
    }

    #[Route('/{id}/delete', name: 'app_admin_equipement_delete', methods: ['POST'])]
    public function delete(Equipement $equipement, Request $request, EntityManagerInterface $entityManager): Response
    {
        $token = (string) $request->request->get('_token', '');

        if (!$this->isCsrfTokenValid('deletemodal-equipement-delete-' . $equipement->getId(), $token)) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $entityManager->remove($equipement);
        $entityManager->flush();

        return $this->redirectToRoute('app_loged');
    }
}
