<?php

namespace App\Controller\admin;

use App\Entity\Reunion;
use App\Form\ReunionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/reunion')]
final class ReunionsController extends AbstractController
{
    #[Route('/new', name: 'app_admin_reunion_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reunion = new Reunion();
        $form = $this->createForm(ReunionType::class, $reunion, [
            'action' => $this->generateUrl('app_admin_reunion_new'),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reunion);
            $entityManager->flush();

            return $this->redirectToRoute('app_loged');
        }

        return $this->render('admin/form.html.twig', [
            'form' => $form,
            'titrePage' => 'Ajouter une réunion',
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_reunion_edit', methods: ['POST'])]
    public function edit(Reunion $reunion, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReunionType::class, $reunion, [
            'action' => $this->generateUrl('app_admin_reunion_edit', ['id' => $reunion->getId()]),
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_loged');
        }

        return $this->render('admin/form.html.twig', [
            'form' => $form,
            'titrePage' => 'Modifier une réunion',
        ]);
    }

    #[Route('/{id}/delete', name: 'app_admin_reunion_delete', methods: ['POST'])]
    public function delete(Reunion $reunion, Request $request, EntityManagerInterface $entityManager): Response
    {
        $token = (string) $request->request->get('_token', '');

        if (!$this->isCsrfTokenValid('deletemodal-reunion-delete-' . $reunion->getId(), $token)) {
            throw $this->createAccessDeniedException('Token CSRF invalide.');
        }

        $entityManager->remove($reunion);
        $entityManager->flush();

        return $this->redirectToRoute('app_loged');
    }
}
