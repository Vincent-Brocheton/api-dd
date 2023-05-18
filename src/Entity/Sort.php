<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SortRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SortRepository::class)]
#[ApiResource]
class Sort
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
