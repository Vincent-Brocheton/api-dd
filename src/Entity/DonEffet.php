<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DonEffetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonEffetRepository::class)]
#[ApiResource]
class DonEffet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'donEffets')]
    private ?Don $don = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $effet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDon(): ?Don
    {
        return $this->don;
    }

    public function setDon(?Don $don): self
    {
        $this->don = $don;

        return $this;
    }

    public function getEffet(): ?string
    {
        return $this->effet;
    }

    public function setEffet(string $effet): self
    {
        $this->effet = $effet;

        return $this;
    }
}
