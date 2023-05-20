<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CompetenceRepository::class)]
#[ApiResource]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom de la compétence ne peut pas être vide')]
    #[Assert\Length(min: 3, max: 255,minMessage: 'Le nom de la compétence doit contenir au moins 3 caractères', maxMessage: 'Le nom de la compétence ne peut pas contenir plus de 255 caractères')]
    #[Assert\Regex(pattern: '/^[a-zA-Zé]+$/', message: 'Le nom de la compétence ne peut contenir que des lettres')]
    private ?string $nom = null;

    #[ORM\Column(length: 3)]
    #[Assert\NotBlank(message: 'Le nom de la stat ne peut pas être vide')]
    #[Assert\Length(min: 3, max: 3,minMessage: 'Le nom de la stat doit contenir au moins 3 caractères', maxMessage: 'Le nom de la stat ne peut pas contenir plus de 3 caractères')]
    #[Assert\Regex(pattern: '/^[a-zA-Zé]+$/', message: 'Le nom de la stat ne peut contenir que des lettres')]
    private ?string $stat = null;

    #[ORM\OneToMany(mappedBy: 'competence', targetEntity: CompetencePersonnage::class)]
    private Collection $competencePersonnages;

    public function __construct()
    {
        $this->competencePersonnages = new ArrayCollection();
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

    public function getStat(): ?string
    {
        return $this->stat;
    }

    public function setStat(string $stat): self
    {
        $this->stat = $stat;

        return $this;
    }

    /**
     * @return Collection<int, CompetencePersonnage>
     */
    public function getCompetencePersonnages(): Collection
    {
        return $this->competencePersonnages;
    }

    public function addCompetencePersonnage(CompetencePersonnage $competencePersonnage): self
    {
        if (!$this->competencePersonnages->contains($competencePersonnage)) {
            $this->competencePersonnages->add($competencePersonnage);
            $competencePersonnage->setCompetence($this);
        }

        return $this;
    }

    public function removeCompetencePersonnage(CompetencePersonnage $competencePersonnage): self
    {
        if ($this->competencePersonnages->removeElement($competencePersonnage)) {
            // set the owning side to null (unless already changed)
            if ($competencePersonnage->getCompetence() === $this) {
                $competencePersonnage->setCompetence(null);
            }
        }

        return $this;
    }
}
