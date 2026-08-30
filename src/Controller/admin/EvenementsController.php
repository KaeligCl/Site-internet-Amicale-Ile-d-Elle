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
        $form = $this->createForm(EvenementsType::class, $evenement);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($evenement);
            $entityManager->flush();

            return $this->redirectToRoute('app_loged');
        }

        return $this->redirectToRoute('app_loged');
    }

    #[Route('/{id}/edit', name: 'app_admin_evenement_edit', methods: ['POST'])]
    public function edit(
        Evenements $evenement,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $form = $this->createForm(EvenementsType::class, $evenement);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_loged');
        }

        return $this->redirectToRoute('app_loged');
    }

    #[Route('/{id}/delete', name: 'app_admin_evenement_delete', methods: ['POST'])]
    public function delete(
        Evenements $evenement,
        EntityManagerInterface $entityManager
    ): Response {
        $entityManager->remove($evenement);
        $entityManager->flush();

        return $this->redirectToRoute('app_loged');
    }
}