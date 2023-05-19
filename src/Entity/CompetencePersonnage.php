<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CompetencePersonnageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetencePersonnageRepository::class)]
#[ApiResource]
class CompetencePersonnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'competencePersonnages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Personnage $personnage = null;

    #[ORM\ManyToOne(inversedBy: 'competencePersonnages')]
    private ?Competence $competence = null;

    #[ORM\Column]
    private ?bool $isMaitrise = null;

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

    public function getCompetence(): ?Competence
    {
        return $this->competence;
    }

    public function setCompetence(?Competence $competence): self
    {
        $this->competence = $competence;

        return $this;
    }

    public function isIsMaitrise(): ?bool
    {
        return $this->isMaitrise;
    }

    public function setIsMaitrise(bool $isMaitrise): self
    {
        $this->isMaitrise = $isMaitrise;

        return $this;
    }
}
