<?php

namespace App\Entity;

use App\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhoneRepository::class)]
class Phone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Ong::class, inversedBy: 'ong')]
    #[ORM\Column]
    private int $ong_id;

    #[ORM\Column(length: 255)]
    private string $number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOngId(): ?int
    {
        return $this->ong_id;
    }

    public function setOngId(int $ong_id): Phone
    {
        $this->ong_id = $ong_id;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = $number;

        return $this;
    }
}
