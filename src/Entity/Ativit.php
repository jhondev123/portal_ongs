<?php

namespace App\Entity;

use App\Entity\Ong;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AtivitRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: AtivitRepository::class)]
class Ativit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Ong::class, mappedBy: 'ativit')]
    private Collection $ong;


    public function __construct(

        #[ORM\Column(length: 255)]
        private string $name,

    ) {
        $this->ong = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getOng(): Collection
    {
        return $this->ong;
    }
    public function addOng(Ong $ong): void
    {
        if ($this->ong->contains($ong)) {
            return;
        }
        $this->ong->add($ong);
        $ong->addAtivit($this);
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
