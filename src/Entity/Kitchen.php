<?php

namespace App\Entity;

use App\Repository\KitchenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KitchenRepository::class)]
class Kitchen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Meal_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMealName(): ?string
    {
        return $this->Meal_name;
    }

    public function setMealName(string $Meal_name): static
    {
        $this->Meal_name = $Meal_name;

        return $this;
    }
}
