<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceRepository::class)]
#[ApiResource]
class Race
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: RaceTrait::class, mappedBy: 'race')]
    private Collection $raceTraits;

    public function __construct()
    {
        $this->raceTraits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, RaceTrait>
     */
    public function getRaceTraits(): Collection
    {
        return $this->raceTraits;
    }

    public function addRaceTrait(RaceTrait $raceTrait): self
    {
        if (!$this->raceTraits->contains($raceTrait)) {
            $this->raceTraits->add($raceTrait);
            $raceTrait->addRace($this);
        }

        return $this;
    }

    public function removeRaceTrait(RaceTrait $raceTrait): self
    {
        if ($this->raceTraits->removeElement($raceTrait)) {
            $raceTrait->removeRace($this);
        }

        return $this;
    }
}
