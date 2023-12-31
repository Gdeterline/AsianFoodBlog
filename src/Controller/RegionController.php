<?php

namespace App\Controller;

use App\Entity\Region;
use App\Form\RegionType;
use App\Repository\RegionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Meal;
use App\Entity\Member;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;



class RegionController extends AbstractController
{
    #[Route('/region', name: 'app_region_index', methods: ['GET'])]
    public function index(RegionRepository $regionRepository): Response
    {

        return $this->render('region/index.html.twig', [
            'regions' => $regionRepository->findAll(),
        ]);
    }

    #[Route('/region/new/{memberId}', name: 'app_region_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, $memberId): Response
    {   
    
        $member = $entityManager->getRepository(Member::class)->find($memberId);
        $region = new Region();
        $region->setRelation($member);
        

        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($region);
            $entityManager->flush();

            return $this->redirectToRoute('app_region_index', ['memberId' => $memberId], Response::HTTP_SEE_OTHER);
        }

        return $this->render('region/new.html.twig', [
            'region' => $region,
            'form' => $form,
            'memberId' => $member->getId(),
        ]);
    }

    #[Route('/region/{id}', name: 'app_region_show', methods: ['GET'])]
    public function show(Region $region): Response
    {
        $publicMeals = $region->getRelationObject();
        return $this->render('region/show.html.twig', [
            'region' => $region,
            'publicMeals' => $publicMeals,
        ]);
    }

    /*

    #[Route('/region/{regionId}/meal/{mealId}', name: 'app_region_meal_show')]
    public function showMeal(Region $region, Meal $meal): Response
    {
       
        $gallery = $meal->getRegions();

        return $this->render('region/meal_show.html.twig', [
            'region' => $region,
            'meal' => $meal,
            'gallery' => $gallery,
        ]);
    }

    */

    #[Route('/region/{id}', name: 'app_region_show')]
    public function showRegion(Region $region): Response
    {
        //$publicMeals = $region->getRelationObject();

        return $this->render('region/show.html.twig', [
            'region' => $region,
            //'publicMeals' => $publicMeals,
        ]);
    }

    

    #[Route('/{region_id}/meal/{meal_id}', methods: ['GET'], name: 'app_region_meal_show')]

    public function mealShow(Region $region, Meal $meal): Response
    {
            if(! $region->getRelationObject()->contains($meal)) {
                    throw $this->createNotFoundException("Couldn't find such a meal in this region!");
            }
    
            if(! $region->isPublished()) {
                    throw $this->createAccessDeniedException("You cannot access the requested ressource!");
            }
    
            return $this->render('region/meal_show.html.twig', [
                    'meal' => $meal,
                      'region' => $region
              ]);
    }

    #[Route('/region/{id}/edit', name: 'app_region_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Region $region, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_region_index', ['region_id' => $region->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('region/edit.html.twig', [
            'region' => $region,
            'form' => $form,
        ]);
    }

    #[Route('/region/{id}', name: 'app_region_delete', methods: ['POST'])]
    public function delete(Request $request, Region $region, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$region->getId(), $request->request->get('_token'))) {
            $entityManager->remove($region);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_region_index', [], Response::HTTP_SEE_OTHER);
    }

    

}
