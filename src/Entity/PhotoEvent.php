<?php

namespace App\Entity;

use App\Repository\PhotoEventRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoEventRepository::class)]
class PhotoEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pic1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pic2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pic3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pic4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pic5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pic6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pic7 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pic8 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Pic9 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPic1(): ?string
    {
        return $this->Pic1;
    }

    public function setPic1(?string $Pic1): static
    {
        $this->Pic1 = $Pic1;

        return $this;
    }

    public function getPic2(): ?string
    {
        return $this->Pic2;
    }

    public function setPic2(?string $Pic2): static
    {
        $this->Pic2 = $Pic2;

        return $this;
    }

    public function getPic3(): ?string
    {
        return $this->Pic3;
    }

    public function setPic3(?string $Pic3): static
    {
        $this->Pic3 = $Pic3;

        return $this;
    }

    public function getPic4(): ?string
    {
        return $this->Pic4;
    }

    public function setPic4(?string $Pic4): static
    {
        $this->Pic4 = $Pic4;

        return $this;
    }

    public function getPic5(): ?string
    {
        return $this->Pic5;
    }

    public function setPic5(?string $Pic5): static
    {
        $this->Pic5 = $Pic5;

        return $this;
    }

    public function getPic6(): ?string
    {
        return $this->Pic6;
    }

    public function setPic6(?string $Pic6): static
    {
        $this->Pic6 = $Pic6;

        return $this;
    }

    public function getPic7(): ?string
    {
        return $this->Pic7;
    }

    public function setPic7(?string $Pic7): static
    {
        $this->Pic7 = $Pic7;

        return $this;
    }

    public function getPic8(): ?string
    {
        return $this->Pic8;
    }

    public function setPic8(?string $Pic8): static
    {
        $this->Pic8 = $Pic8;

        return $this;
    }

    public function getPic9(): ?string
    {
        return $this->Pic9;
    }

    public function setPic9(?string $Pic9): static
    {
        $this->Pic9 = $Pic9;

        return $this;
    }
}
