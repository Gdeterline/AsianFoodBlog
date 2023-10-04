<?php

namespace App\Entity;

use App\Repository\KitchenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'kitchen', targetEntity: Meal::class)]
    private Collection $category;

    #[ORM\OneToOne(mappedBy: 'category', cascade: ['persist', 'remove'])]
    private ?Member $member = null;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKitchenName(): ?string
    {
        return $this->Meal_name;
    }

    public function setKitchenName(string $Meal_name): static
    {
        $this->Meal_name = $Meal_name;

        return $this;
    }

    /**
     * @return Collection<int, Meal>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Meal $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
            $category->setKitchen($this);
        }

        return $this;
    }

    public function removeCategory(Meal $category): static
    {
        if ($this->category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getKitchen() === $this) {
                $category->setKitchen(null);
            }
        }

        return $this;
    }

    public function getMember(): ?Member
    {
        return $this->member;
    }

    public function setMember(?Member $member): static
    {
        // unset the owning side of the relation if necessary
        if ($member === null && $this->member !== null) {
            $this->member->setCategory(null);
        }

        // set the owning side of the relation if necessary
        if ($member !== null && $member->getCategory() !== $this) {
            $member->setCategory($this);
        }

        $this->member = $member;

        return $this;
    }
}
