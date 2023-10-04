<?php

namespace App\Controller;

use App\Repository\KitchenRepository;
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

    #[Route('/kitchen/list', name: 'kitchens_list', methods: ['GET'])]
    public function listAction(KitchenRepository $KitchenRepository)
    {
        $htmlpage = '<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kitchens list!</title>
    </head>
    <body>
        <h1>kitchens list</h1>
        <p>Here are all your kitchens:</p>
        <ul>';

        $kitchens = $KitchenRepository->findAll();
        foreach($kitchens as $kitchen) {
            $htmlpage .= '<li>'. $kitchen->getKitchenName() .'</li>';
        }
        $htmlpage .= '</ul>';

        $htmlpage .= '</body></html>';

        return new Response(
            $htmlpage,
            Response::HTTP_OK,
            array('content-type' => 'text/html')
            );
    }

}
