<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KitchenController extends AbstractController
{
    #[Route('/kitchen', name: 'app_kitchen')]
    public function index(): Response
    {
        return $this->render('kitchen/index.html.twig', [
            'controller_name' => 'KitchenController',
        ]);
    }
}
