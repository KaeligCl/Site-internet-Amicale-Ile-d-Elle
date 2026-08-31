<?php

namespace App\Controller\admin;

use App\Entity\Evenements;
use App\Form\EvenementsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/evenement')]
final class EvenementsController extends AbstractController
{
    #[Route('/new', name: 'app_admin_evenement_new', methods: ['POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $evenement = new Evenements();
        $form = $this->createForm(EvenementsType::class, $evenement, [
            'action' => $this->generateUrl('app_admin_evenement_new'),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($evenement);
            $entityManager->flush();

            return $this->redirectToRoute('app_loged');
        }

        return $this->render('admin/form.html.twig', [
            'form' => $form,
            'titrePage' => 'Ajouter un événement',
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_evenement_edit', methods: ['POST'])]
    public function edit(
        Evenements $evenement,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(EvenementsType::class, $evenement, [
            'action' => $this->generateUrl('app_admin_evenement_edit', ['id' => $evenement->getId()]),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_loged');
        }

        return $this->render('admin/form.html.twig', [
            'form' => $form,
            'titrePage' => 'Modifier un événement',
        ]);
    }

    #[Route('/{id}/delete', name: 'app_admin_evenement_delete', methods: ['POST'])]
    public function delete(
        Evenements $evenement,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $token = (string) $request->request->get('_token', '');

        if (!$this->isCsrfTokenValid('deletemodal-evenement-delete-' . $evenement->getId(), $token)) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $entityManager->remove($evenement);
        $entityManager->flush();

        return $this->redirectToRoute('app_loged');
    }
}