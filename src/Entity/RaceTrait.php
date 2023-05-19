<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\RaceTraitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceTraitRepository::class)]
#[ApiResource]
class RaceTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $modCarac = null;

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $modificateur = null;

    #[ORM\ManyToMany(targetEntity: Race::class, inversedBy: 'raceTraits')]
    private Collection $race;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $carac = null;

    public function __construct()
    {
        $this->race = new ArrayCollection();
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

    public function isModCarac(): ?bool
    {
        return $this->modCarac;
    }

    public function setModCarac(bool $modCarac): self
    {
        $this->modCarac = $modCarac;

        return $this;
    }

    public function getModificateur(): ?string
    {
        return $this->modificateur;
    }

    public function setModificateur(?string $modificateur): self
    {
        $this->modificateur = $modificateur;

        return $this;
    }

    /**
     * @return Collection<int, Race>
     */
    public function getRace(): Collection
    {
        return $this->race;
    }

    public function addRace(Race $race): self
    {
        if (!$this->race->contains($race)) {
            $this->race->add($race);
        }

        return $this;
    }

    public function removeRace(Race $race): self
    {
        $this->race->removeElement($race);

        return $this;
    }

    public function getCarac(): ?string
    {
        return $this->carac;
    }

    public function setCarac(?string $carac): self
    {
        $this->carac = $carac;

        return $this;
    }
}
