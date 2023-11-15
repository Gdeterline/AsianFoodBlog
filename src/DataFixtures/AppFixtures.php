<?php

// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Kitchen;
use App\Entity\Meal;
use App\Entity\Member;
use App\Entity\Region;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Create some test kitchens
        $kitchen1 = new Kitchen();
        $kitchen1->setName('Kitchen 1');
        $manager->persist($kitchen1);

        $kitchen2 = new Kitchen();
        $kitchen2->setName('Kitchen 2');
        $manager->persist($kitchen2);

        // Create some test meals
        $meal1 = new Meal();
        $meal1->setName('Meal 1');
        $meal1->setDescription('Description for Meal 1');
        $meal1->setKitchen($kitchen1);
        $manager->persist($meal1);

        $meal2 = new Meal();
        $meal2->setName('Meal 2');
        $meal2->setDescription('Description for Meal 2');
        $meal2->setKitchen($kitchen2);
        $manager->persist($meal2);

        // Create some test members
        $member1 = new Member();
        $member1->setName('Member 1');
        $member1->setRelation('Relation 1');
        $member1->setCategory($kitchen1);
        $manager->persist($member1);

        $member2 = new Member();
        $member2->setName('Member 2');
        $member2->setRelation('Relation 2');
        $member2->setCategory($kitchen2);
        $manager->persist($member2);

        // Create some test regions
        $region1 = new Region();
        $region1->setDescription('China');
        $region1->setPublished(true);
        $manager->persist($region1);

        $region2 = new Region();
        $region2->setDescription('Vietnam');
        $region2->setPublished(true);
        $manager->persist($region2);

        // Flush the changes to the database
        $manager->flush();
    }
}

