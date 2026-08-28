<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ReunionController extends AbstractController
{
    #[Route('/reunion', name: 'app_reunion')]
    public function index(): Response
    {
        return $this->render('reunion/index.html.twig', [
            'controller_name' => 'ReunionController',
        ]);
    }
}
