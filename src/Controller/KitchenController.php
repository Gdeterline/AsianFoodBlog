<?php

namespace App\Controller;

use App\Entity\Kitchen;
use App\Repository\KitchenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class KitchenController extends AbstractController
{
    #[Route('/kitchen', name: 'app_kitchen')]
    public function index(): Response
    {
        return $this->render('kitchen/index.html.twig', [
            'controller_name' => 'KitchenController',
        ]);
    }

    #[Route('/kitchen/list', name: 'kitchen_index', methods: ['GET'])]
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
            $htmlpage .= '<li><a href="' . $this->generateUrl('kitchen_show', ['id' => $kitchen->getId()]) . '">' . $kitchen->getName() . '</a></li>';
        }
        
        $htmlpage .= '</ul>';

        $htmlpage .= '</body></html>';

        return new Response(
            $htmlpage,
            Response::HTTP_OK,
            array('content-type' => 'text/html')
            );
    }

    /**
     * Show a kitchen
     *
     * @param int $id (note that the id must be an integer)
     */
    #[Route('/kitchen/{id}', name: 'kitchen_show', requirements: ['id' => '\d+'])]
    public function show(ManagerRegistry $doctrine, $id): Response
    {

        $entity_manager = $doctrine->getManager();
        $kitchen = $entity_manager->getRepository(Kitchen::class)->find($id);
        //$member= $kitchen->getMember();

        return $this->render('kitchen/show.html.twig', [
            'kitchen' => $kitchen,
            //'url' => $this->generateUrl('member_show', ['id' => $member->getId()]),
        ]);
    }

}
