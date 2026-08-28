<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $prixPlein = null;

    #[ORM\Column]
    private ?int $prixMembre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column]
    private ?bool $encoreDisponible = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrixPlein(): ?int
    {
        return $this->prixPlein;
    }

    public function setPrixPlein(int $prixPlein): static
    {
        $this->prixPlein = $prixPlein;

        return $this;
    }

    public function getPrixMembre(): ?int
    {
        return $this->prixMembre;
    }

    public function setPrixMembre(int $prixMembre): static
    {
        $this->prixMembre = $prixMembre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function isEncoreDisponible(): ?bool
    {
        return $this->encoreDisponible;
    }

    public function setEncoreDisponible(bool $encoreDisponible): static
    {
        $this->encoreDisponible = $encoreDisponible;

        return $this;
    }
}
