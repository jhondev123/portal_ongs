<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ManyToOne(targetEntity: Ong::class, inversedBy: 'ong')]
    #[ORM\Column]
    private int $ong_id;


    public function __construct(

        #[ORM\Column(length: 255)]
        private string $cep,

        #[ORM\Column(length: 255)]
        private string $street,

        #[ORM\Column(length: 255)]
        private string $number,

        #[ORM\Column(length: 255)]
        private string $city,

        #[ORM\Column(length: 255)]
        private string $state,

        #[ORM\Column(length: 255)]
        private string $neighborhood,

        #[ORM\Column(length: 255)]
        private ?string $complement = null

    ) {}

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

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(string $cep): static
    {
        $this->cep = $cep;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): static
    {
        $this->street = $street;

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getNeighborhood(): ?string
    {
        return $this->neighborhood;
    }

    public function setNeighborhood(string $neighborhood): static
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(string $complement): static
    {
        $this->complement = $complement;

        return $this;
    }
}
