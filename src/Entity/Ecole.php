<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EcoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EcoleRepository::class)]
#[ApiResource]
class Ecole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'ecole', targetEntity: Sort::class, orphanRemoval: true)]
    private Collection $sorts;

    public function __construct()
    {
        $this->sorts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Sort>
     */
    public function getSorts(): Collection
    {
        return $this->sorts;
    }

    public function addSort(Sort $sort): self
    {
        if (!$this->sorts->contains($sort)) {
            $this->sorts->add($sort);
            $sort->setEcole($this);
        }

        return $this;
    }

    public function removeSort(Sort $sort): self
    {
        if ($this->sorts->removeElement($sort)) {
            // set the owning side to null (unless already changed)
            if ($sort->getEcole() === $this) {
                $sort->setEcole(null);
            }
        }

        return $this;
    }
}
