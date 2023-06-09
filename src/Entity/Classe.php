<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
#[ApiResource]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom de la classe ne peut pas être vide')]
    #[Assert\Length(min: 3, max: 255,minMessage: 'Le nom de la classe doit contenir au moins 3 caractères', maxMessage: 'Le nom de la classe ne peut pas contenir plus de 255 caractères')]
    #[Assert\Regex(pattern: '/^[a-zA-Z]+$/', message: 'Le nom de la classe ne peut contenir que des lettres')]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'La description de la classe ne peut pas être vide')]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'classe', targetEntity: PersonnageClasse::class)]
    private Collection $personnageClasses;

    public function __construct()
    {
        $this->personnageClasses = new ArrayCollection();
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
     * @return Collection<int, PersonnageClasse>
     */
    public function getPersonnageClasses(): Collection
    {
        return $this->personnageClasses;
    }

    public function addPersonnageClass(PersonnageClasse $personnageClass): self
    {
        if (!$this->personnageClasses->contains($personnageClass)) {
            $this->personnageClasses->add($personnageClass);
            $personnageClass->setClasse($this);
        }

        return $this;
    }

    public function removePersonnageClass(PersonnageClasse $personnageClass): self
    {
        if ($this->personnageClasses->removeElement($personnageClass)) {
            // set the owning side to null (unless already changed)
            if ($personnageClass->getClasse() === $this) {
                $personnageClass->setClasse(null);
            }
        }

        return $this;
    }
}
