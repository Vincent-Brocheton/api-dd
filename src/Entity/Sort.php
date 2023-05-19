<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SortRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SortRepository::class)]
#[ApiResource]
class Sort
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $niveau = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $jet = null;

    #[ORM\Column]
    private ?bool $sauvegarde = null;

    #[ORM\Column(nullable: true)]
    private ?int $sauvegardeLevel = null;

    #[ORM\ManyToOne(inversedBy: 'sorts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ecole $ecole = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $typeJet = null;

    #[ORM\OneToMany(mappedBy: 'sort', targetEntity: PersonnageSort::class)]
    private Collection $personnageSorts;

    public function __construct()
    {
        $this->personnageSorts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function isJet(): ?bool
    {
        return $this->jet;
    }

    public function setJet(bool $jet): self
    {
        $this->jet = $jet;

        return $this;
    }

    public function isSauvegarde(): ?bool
    {
        return $this->sauvegarde;
    }

    public function setSauvegarde(bool $sauvegarde): self
    {
        $this->sauvegarde = $sauvegarde;

        return $this;
    }

    public function getSauvegardeLevel(): ?int
    {
        return $this->sauvegardeLevel;
    }

    public function setSauvegardeLevel(int $sauvegardeLevel): self
    {
        $this->sauvegardeLevel = $sauvegardeLevel;

        return $this;
    }

    public function getEcole(): ?Ecole
    {
        return $this->ecole;
    }

    public function setEcole(?Ecole $ecole): self
    {
        $this->ecole = $ecole;

        return $this;
    }

    public function getTypeJet(): ?string
    {
        return $this->typeJet;
    }

    public function setTypeJet(?string $typeJet): self
    {
        $this->typeJet = $typeJet;

        return $this;
    }

    /**
     * @return Collection<int, PersonnageSort>
     */
    public function getPersonnageSorts(): Collection
    {
        return $this->personnageSorts;
    }

    public function addPersonnageSort(PersonnageSort $personnageSort): self
    {
        if (!$this->personnageSorts->contains($personnageSort)) {
            $this->personnageSorts->add($personnageSort);
            $personnageSort->setSort($this);
        }

        return $this;
    }

    public function removePersonnageSort(PersonnageSort $personnageSort): self
    {
        if ($this->personnageSorts->removeElement($personnageSort)) {
            // set the owning side to null (unless already changed)
            if ($personnageSort->getSort() === $this) {
                $personnageSort->setSort(null);
            }
        }

        return $this;
    }
}
