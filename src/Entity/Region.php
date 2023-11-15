<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegionRepository::class)]
class Region
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?bool $published = null;

    #[ORM\ManyToOne(inversedBy: 'regions')]
    private ?Member $relation = null;

    #[ORM\ManyToMany(targetEntity: Meal::class, inversedBy: 'regions')]
    private Collection $relation_object;

    public function __construct()
    {
        $this->relation_object = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(?bool $published): static
    {
        $this->published = $published;

        return $this;
    }

    public function getRelation(): ?Member
    {
        return $this->relation;
    }

    public function setRelation(?Member $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * @return Collection<int, Meal>
     */
    public function getRelationObject(): Collection
    {
        return $this->relation_object;
    }

    public function addRelationObject(Meal $relationObject): static
    {
        if (!$this->relation_object->contains($relationObject)) {
            $this->relation_object->add($relationObject);
        }

        return $this;
    }

    public function removeRelationObject(Meal $relationObject): static
    {
        $this->relation_object->removeElement($relationObject);

        return $this;
    }
}
