<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PersonnageClasseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnageClasseRepository::class)]
#[ApiResource]
class PersonnageClasse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'personnageClasses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Personnage $personnage = null;

    #[ORM\ManyToOne(inversedBy: 'personnageClasses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classe $classe = null;

    #[ORM\Column]
    private ?int $niveau = null;

    #[ORM\Column]
    private ?bool $principale = null;

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

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function isPrincipale(): ?bool
    {
        return $this->principale;
    }

    public function setPrincipale(bool $principale): self
    {
        $this->principale = $principale;

        return $this;
    }
}
