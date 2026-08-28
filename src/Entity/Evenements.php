<?php

namespace App\Entity;

use App\Repository\EvenementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementsRepository::class)]
class Evenements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTime $dateDebut = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateFin = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lienEvent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoEvent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $afficheEvent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTime $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTime $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getLienEvent(): ?string
    {
        return $this->lienEvent;
    }

    public function setLienEvent(?string $lienEvent): static
    {
        $this->lienEvent = $lienEvent;

        return $this;
    }

    public function getPhotoEvent(): ?string
    {
        return $this->photoEvent;
    }

    public function setPhotoEvent(?string $photoEvent): static
    {
        $this->photoEvent = $photoEvent;

        return $this;
    }

    public function getAfficheEvent(): ?string
    {
        return $this->afficheEvent;
    }

    public function setAfficheEvent(?string $afficheEvent): static
    {
        $this->afficheEvent = $afficheEvent;

        return $this;
    }
}
