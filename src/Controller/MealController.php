<?php

namespace App\Controller;

use App\Entity\Meal;
use App\Repository\MealRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class MealController extends AbstractController
{
    
    /**
     * Show a meal
     *
     * @param int $id (note that the id must be an integer)
     */
    #[Route('/meal/{id}', name: 'meal_show', requirements: ['id' => '\d+'])]
    public function show(ManagerRegistry $doctrine, $id): Response
    {

        $entity_manager = $doctrine->getManager();
        $meal = $entity_manager->getRepository(Meal::class)->find($id);
        //$member= $meal->getMember();

        return $this->render('meal/show.html.twig', [
            'meal' => $meal,
            //'url' => $this->generateUrl('member_show', ['id' => $member->getId()]),
        ]);
    }

}
