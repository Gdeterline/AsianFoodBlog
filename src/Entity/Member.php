<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemberRepository::class)]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $relation = null;

    #[ORM\OneToOne(inversedBy: 'member',targetEntity:Kitchen::class, cascade: ['persist', 'remove'])]
    private ?Kitchen $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): static
    {
        $this->relation = $relation;

        return $this;
    }

    public function getCategory(): ?Kitchen
    {
        return $this->category;
    }

    public function setCategory(?Kitchen $category): static
    {
        $this->category = $category;

        return $this;
    }
}
