<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use App\Form\EvenementsType;
use App\Form\EquipeType;
use App\Form\EquipementType;
use App\Form\ReunionType;

use App\Repository\EvenementsRepository;
use App\Repository\LocationRequestRepository;
use App\Repository\ReunionRepository;
use App\Repository\EquipeRepository;
use App\Repository\EquipementRepository;


final class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_loged');
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/loged', name: 'app_loged')]
public function loged(
    EvenementsRepository $evenementsRepository,
    ReunionRepository $reunionRepository,
    EquipeRepository $equipeRepository,
    EquipementRepository $equipementRepository,
    LocationRequestRepository $locationRequestRepository
): Response {
    $evenements = $evenementsRepository->findAll();

    $evenementForm = $this->createForm(EvenementsType::class, null, [
        'action' => $this->generateUrl('app_admin_evenement_new'),
        'method' => 'POST',
    ]);

    $editForms = [];

    foreach ($evenements as $evenement) {
        $editForms[$evenement->getId()] = $this->createForm(
            EvenementsType::class,
            $evenement,
            [
                'action' => $this->generateUrl(
                    'app_admin_evenement_edit',
                    ['id' => $evenement->getId()]
                ),
                'method' => 'POST',
            ]
        )->createView();
    }

    $reunions = $reunionRepository->findAll();
    $membres = $equipeRepository->findAll();
    $equipements = $equipementRepository->findAll();

    $reunionForm = $this->createForm(ReunionType::class, null, [
        'action' => $this->generateUrl('app_admin_reunion_new'),
        'method' => 'POST',
    ])->createView();

    $equipeForm = $this->createForm(EquipeType::class, null, [
        'action' => $this->generateUrl('app_admin_equipe_new'),
        'method' => 'POST',
    ])->createView();

    $equipementForm = $this->createForm(EquipementType::class, null, [
        'action' => $this->generateUrl('app_admin_equipement_new'),
        'method' => 'POST',
    ])->createView();

    $reunionEditForms = [];
    foreach ($reunions as $reunion) {
        $reunionEditForms[$reunion->getId()] = $this->createForm(
            ReunionType::class,
            $reunion,
            [
                'action' => $this->generateUrl('app_admin_reunion_edit', ['id' => $reunion->getId()]),
                'method' => 'POST',
            ]
        )->createView();
    }

    $equipeEditForms = [];
    foreach ($membres as $membre) {
        $equipeEditForms[$membre->getId()] = $this->createForm(
            EquipeType::class,
            $membre,
            [
                'action' => $this->generateUrl('app_admin_equipe_edit', ['id' => $membre->getId()]),
                'method' => 'POST',
            ]
        )->createView();
    }

    $equipementEditForms = [];
    foreach ($equipements as $equipement) {
        $equipementEditForms[$equipement->getId()] = $this->createForm(
            EquipementType::class,
            $equipement,
            [
                'action' => $this->generateUrl('app_admin_equipement_edit', ['id' => $equipement->getId()]),
                'method' => 'POST',
            ]
        )->createView();
    }

    return $this->render('security/loged.html.twig', [
        'evenements' => $evenements,
        'evenementForm' => $evenementForm->createView(),
        'editForms' => $editForms,

        'reunions' => $reunions,
        'reunionForm' => $reunionForm,
        'reunionEditForms' => $reunionEditForms,

        'demandesNouvelles' => $locationRequestRepository->findNouvelles(),
        'demandesTraitees' => $locationRequestRepository->findTraitees(),

        'equipe' => $membres,
        'equipeForm' => $equipeForm,
        'equipeEditForms' => $equipeEditForms,

        'locations' => $equipements,
        'equipementForm' => $equipementForm,
        'equipementEditForms' => $equipementEditForms,
    ]);
}
}
