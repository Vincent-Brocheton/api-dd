<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonRepository::class)]
#[ApiResource]
class Don
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prerequis = null;

    #[ORM\OneToMany(mappedBy: 'don', targetEntity: DonEffet::class)]
    private Collection $donEffets;

    #[ORM\ManyToMany(targetEntity: Personnage::class, inversedBy: 'dons')]
    private Collection $personnage;

    public function __construct()
    {
        $this->donEffets = new ArrayCollection();
        $this->personnage = new ArrayCollection();
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

    public function getPrerequis(): ?string
    {
        return $this->prerequis;
    }

    public function setPrerequis(?string $prerequis): self
    {
        $this->prerequis = $prerequis;

        return $this;
    }

    /**
     * @return Collection<int, DonEffet>
     */
    public function getDonEffets(): Collection
    {
        return $this->donEffets;
    }

    public function addDonEffet(DonEffet $donEffet): self
    {
        if (!$this->donEffets->contains($donEffet)) {
            $this->donEffets->add($donEffet);
            $donEffet->setDon($this);
        }

        return $this;
    }

    public function removeDonEffet(DonEffet $donEffet): self
    {
        if ($this->donEffets->removeElement($donEffet)) {
            // set the owning side to null (unless already changed)
            if ($donEffet->getDon() === $this) {
                $donEffet->setDon(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Personnage>
     */
    public function getPersonnage(): Collection
    {
        return $this->personnage;
    }

    public function addPersonnage(Personnage $personnage): self
    {
        if (!$this->personnage->contains($personnage)) {
            $this->personnage->add($personnage);
        }

        return $this;
    }

    public function removePersonnage(Personnage $personnage): self
    {
        $this->personnage->removeElement($personnage);

        return $this;
    }
}
