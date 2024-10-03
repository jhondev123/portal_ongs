<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Ong::class, inversedBy: 'document')]
    #[ORM\Column]
    private int $ong_id;

    public function __construct(
        #[ORM\Column(length: 255)]
        private string $name,
        #[ORM\Column(length: 255)]
        private string $file
    ) {}

    public function setOng(Ong $ong)
    {
        $this->ong_id = $ong;
    }

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): static
    {
        $this->file = $file;

        return $this;
    }
}
