<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnageRepository::class)]
#[ApiResource]
class Personnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $niveau = null;

    #[ORM\OneToMany(mappedBy: 'personnage', targetEntity: PersonnageClasse::class, orphanRemoval: true)]
    private Collection $personnageClasses;

    #[ORM\Column(nullable: true)]
    private ?int $forceStat = null;

    #[ORM\Column(nullable: true)]
    private ?int $forceMod = null;

    #[ORM\Column(nullable: true)]
    private ?int $dexteriteStat = null;

    #[ORM\Column(nullable: true)]
    private ?int $dexteriteMod = null;

    #[ORM\Column(nullable: true)]
    private ?int $constitutionStat = null;

    #[ORM\Column(nullable: true)]
    private ?int $constitutionMod = null;

    #[ORM\Column(nullable: true)]
    private ?int $intelligenceStat = null;

    #[ORM\Column(nullable: true)]
    private ?int $intelligenceMod = null;

    #[ORM\Column(nullable: true)]
    private ?int $sagesseStat = null;

    #[ORM\Column(nullable: true)]
    private ?int $sagesseMod = null;

    #[ORM\Column(nullable: true)]
    private ?int $charismeStat = null;

    #[ORM\Column(nullable: true)]
    private ?int $charismeMod = null;

    #[ORM\Column(nullable: true)]
    private ?int $ca = null;

    #[ORM\Column(nullable: true)]
    private ?int $pv = null;

    #[ORM\Column(nullable: true)]
    private ?int $pvActuel = null;

    #[ORM\Column(nullable: true)]
    private ?int $pvTemp = null;

    #[ORM\Column(length: 6, nullable: true)]
    private ?string $desVie = null;

    #[ORM\Column(nullable: true)]
    private ?int $jdsSucces = null;

    #[ORM\Column(nullable: true)]
    private ?int $jdsEchecs = null;

    #[ORM\OneToMany(mappedBy: 'personnage', targetEntity: CompetencePersonnage::class)]
    private Collection $competencePersonnages;

    #[ORM\Column(length: 4,nullable: true)]
    private ?string $vitesse = null;

    #[ORM\Column(nullable: true)]
    private ?int $maitrise = null;

    #[ORM\Column(length: 2,nullable: true)]
    private ?string $alignement = null;

    #[ORM\Column(nullable: true)]
    private ?int $xp = null;

    #[ORM\OneToMany(mappedBy: 'personnage', targetEntity: PersonnageSort::class)]
    private Collection $personnageSorts;

    #[ORM\ManyToMany(targetEntity: Objet::class, mappedBy: 'personnages')]
    private Collection $objets;

    public function __construct()
    {
        $this->personnageClasses = new ArrayCollection();
        $this->competencePersonnages = new ArrayCollection();
        $this->personnageSorts = new ArrayCollection();
        $this->objets = new ArrayCollection();
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

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

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
            $personnageClass->setPersonnage($this);
        }

        return $this;
    }

    public function removePersonnageClass(PersonnageClasse $personnageClass): self
    {
        if ($this->personnageClasses->removeElement($personnageClass)) {
            // set the owning side to null (unless already changed)
            if ($personnageClass->getPersonnage() === $this) {
                $personnageClass->setPersonnage(null);
            }
        }

        return $this;
    }

    public function getForceStat(): ?int
    {
        return $this->forceStat;
    }

    public function setForceStat(int $forceStat): self
    {
        $this->forceStat = $forceStat;

        return $this;
    }

    public function getForceMod(): ?int
    {
        return $this->forceMod;
    }

    public function setForceMod(int $forceMod): self
    {
        $this->forceMod = $forceMod;

        return $this;
    }

    public function getDexteriteStat(): ?int
    {
        return $this->dexteriteStat;
    }

    public function setDexteriteStat(int $dexteriteStat): self
    {
        $this->dexteriteStat = $dexteriteStat;

        return $this;
    }

    public function getDexteriteMod(): ?int
    {
        return $this->dexteriteMod;
    }

    public function setDexteriteMod(int $dexteriteMod): self
    {
        $this->dexteriteMod = $dexteriteMod;

        return $this;
    }

    public function getConstitutionStat(): ?int
    {
        return $this->constitutionStat;
    }

    public function setConstitutionStat(int $constitutionStat): self
    {
        $this->constitutionStat = $constitutionStat;

        return $this;
    }

    public function getConstitutionMod(): ?int
    {
        return $this->constitutionMod;
    }

    public function setConstitutionMod(int $constitutionMod): self
    {
        $this->constitutionMod = $constitutionMod;

        return $this;
    }

    public function getIntelligenceStat(): ?int
    {
        return $this->intelligenceStat;
    }

    public function setIntelligenceStat(int $intelligenceStat): self
    {
        $this->intelligenceStat = $intelligenceStat;

        return $this;
    }

    public function getIntelligenceMod(): ?int
    {
        return $this->intelligenceMod;
    }

    public function setIntelligenceMod(int $intelligenceMod): self
    {
        $this->intelligenceMod = $intelligenceMod;

        return $this;
    }

    public function getSagesseStat(): ?int
    {
        return $this->sagesseStat;
    }

    public function setSagesseStat(int $sagesseStat): self
    {
        $this->sagesseStat = $sagesseStat;

        return $this;
    }

    public function getSagesseMod(): ?int
    {
        return $this->sagesseMod;
    }

    public function setSagesseMod(int $sagesseMod): self
    {
        $this->sagesseMod = $sagesseMod;

        return $this;
    }

    public function getCharismeStat(): ?int
    {
        return $this->charismeStat;
    }

    public function setCharismeStat(int $charismeStat): self
    {
        $this->charismeStat = $charismeStat;

        return $this;
    }

    public function getCharismeMod(): ?int
    {
        return $this->charismeMod;
    }

    public function setCharismeMod(int $charismeMod): self
    {
        $this->charismeMod = $charismeMod;

        return $this;
    }

    public function getCa(): ?int
    {
        return $this->ca;
    }

    public function setCa(int $ca): self
    {
        $this->ca = $ca;

        return $this;
    }

    public function getPv(): ?int
    {
        return $this->pv;
    }

    public function setPv(int $pv): self
    {
        $this->pv = $pv;

        return $this;
    }

    public function getPvActuel(): ?int
    {
        return $this->pvActuel;
    }

    public function setPvActuel(int $pvActuel): self
    {
        $this->pvActuel = $pvActuel;

        return $this;
    }

    public function getPvTemp(): ?int
    {
        return $this->pvTemp;
    }

    public function setPvTemp(int $pvTemp): self
    {
        $this->pvTemp = $pvTemp;

        return $this;
    }

    public function getDesVie(): ?string
    {
        return $this->desVie;
    }

    public function setDesVie(string $desVie): self
    {
        $this->desVie = $desVie;

        return $this;
    }

    public function getJdsSucces(): ?int
    {
        return $this->jdsSucces;
    }

    public function setJdsSucces(int $jdsSucces): self
    {
        $this->jdsSucces = $jdsSucces;

        return $this;
    }

    public function getJdsEchecs(): ?int
    {
        return $this->jdsEchecs;
    }

    public function setJdsEchecs(int $jdsEchecs): self
    {
        $this->jdsEchecs = $jdsEchecs;

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
            $competencePersonnage->setPersonnage($this);
        }

        return $this;
    }

    public function removeCompetencePersonnage(CompetencePersonnage $competencePersonnage): self
    {
        if ($this->competencePersonnages->removeElement($competencePersonnage)) {
            // set the owning side to null (unless already changed)
            if ($competencePersonnage->getPersonnage() === $this) {
                $competencePersonnage->setPersonnage(null);
            }
        }

        return $this;
    }

    public function getVitesse(): ?string
    {
        return $this->vitesse;
    }

    public function setVitesse(string $vitesse): self
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    public function getMaitrise(): ?int
    {
        return $this->maitrise;
    }

    public function setMaitrise(int $maitrise): self
    {
        $this->maitrise = $maitrise;

        return $this;
    }

    public function getAlignement(): ?string
    {
        return $this->alignement;
    }

    public function setAlignement(string $alignement): self
    {
        $this->alignement = $alignement;

        return $this;
    }

    public function getXp(): ?int
    {
        return $this->xp;
    }

    public function setXp(int $xp): self
    {
        $this->xp = $xp;

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
            $personnageSort->setPersonnage($this);
        }

        return $this;
    }

    public function removePersonnageSort(PersonnageSort $personnageSort): self
    {
        if ($this->personnageSorts->removeElement($personnageSort)) {
            // set the owning side to null (unless already changed)
            if ($personnageSort->getPersonnage() === $this) {
                $personnageSort->setPersonnage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Objet>
     */
    public function getObjets(): Collection
    {
        return $this->objets;
    }

    public function addObjet(Objet $objet): self
    {
        if (!$this->objets->contains($objet)) {
            $this->objets->add($objet);
            $objet->addPersonnage($this);
        }

        return $this;
    }

    public function removeObjet(Objet $objet): self
    {
        if ($this->objets->removeElement($objet)) {
            $objet->removePersonnage($this);
        }

        return $this;
    }
}
