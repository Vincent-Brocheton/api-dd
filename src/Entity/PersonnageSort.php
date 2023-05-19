<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PersonnageSortRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnageSortRepository::class)]
#[ApiResource]
class PersonnageSort
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'personnageSorts')]
    private ?Personnage $personnage = null;

    #[ORM\ManyToOne(inversedBy: 'personnageSorts')]
    private ?Sort $sort = null;

    #[ORM\Column]
    private ?bool $isPrepared = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonnage(): ?Personnage
    {
        return $this->personnage;
    }

    public function setPersonnage(?Personnage $personnage): self
    {
        $this->personnage = $personnage;

        return $this;
    }

    public function getSort(): ?Sort
    {
        return $this->sort;
    }

    public function setSort(?Sort $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    public function isIsPrepared(): ?bool
    {
        return $this->isPrepared;
    }

    public function setIsPrepared(bool $isPrepared): self
    {
        $this->isPrepared = $isPrepared;

        return $this;
    }
}
