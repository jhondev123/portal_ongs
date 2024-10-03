<?php

namespace App\Entity;

use App\Repository\PageTemplatesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageTemplatesRepository::class)]
class PageTemplates
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ong_id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\Column(length: 255)]
    private ?string $banner = null;

    #[ORM\Column(length: 255)]
    private ?string $primary_color = null;

    #[ORM\Column(length: 255)]
    private ?string $secondary_color = null;

    #[ORM\Column(length: 255)]
    private ?string $tertiary_color = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOngId(): ?int
    {
        return $this->ong_id;
    }

    public function setOngId(int $ong_id): static
    {
        $this->ong_id = $ong_id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getBanner(): ?string
    {
        return $this->banner;
    }

    public function setBanner(string $banner): static
    {
        $this->banner = $banner;

        return $this;
    }

    public function getPrimaryColor(): ?string
    {
        return $this->primary_color;
    }

    public function setPrimaryColor(string $primary_color): static
    {
        $this->primary_color = $primary_color;

        return $this;
    }

    public function getSecondaryColor(): ?string
    {
        return $this->secondary_color;
    }

    public function setSecondaryColor(string $secondary_color): static
    {
        $this->secondary_color = $secondary_color;

        return $this;
    }

    public function getTertiaryColor(): ?string
    {
        return $this->tertiary_color;
    }

    public function setTertiaryColor(string $tertiary_color): static
    {
        $this->tertiary_color = $tertiary_color;

        return $this;
    }
}
