<?php

namespace App\Controller\admin;

use App\Entity\Equipe;
use App\Form\EquipeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/equipe')]
final class EquipesController extends AbstractController
{
    #[Route('/new', name: 'app_admin_equipe_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $membre = new Equipe();
        $form = $this->createForm(EquipeType::class, $membre, [
            'action' => $this->generateUrl('app_admin_equipe_new'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('app_loged');
        }

        return $this->render('admin/form.html.twig', [
            'form' => $form,
            'titrePage' => 'Ajouter un membre',
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_equipe_edit', methods: ['POST'])]
    public function edit(Equipe $membre, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EquipeType::class, $membre, [
            'action' => $this->generateUrl('app_admin_equipe_edit', ['id' => $membre->getId()]),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_loged');
        }

        return $this->render('admin/form.html.twig', [
            'form' => $form,
            'titrePage' => 'Modifier un membre',
        ]);
    }

    #[Route('/{id}/delete', name: 'app_admin_equipe_delete', methods: ['POST'])]
    public function delete(Equipe $membre, Request $request, EntityManagerInterface $entityManager): Response
    {
        $token = (string) $request->request->get('_token', '');

        if (!$this->isCsrfTokenValid('deletemodal-equipe-delete-' . $membre->getId(), $token)) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $entityManager->remove($membre);
        $entityManager->flush();

        return $this->redirectToRoute('app_loged');
    }
}
