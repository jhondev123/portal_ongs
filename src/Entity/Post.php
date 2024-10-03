<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    private Ong $ong;

    private User $user;


    public function __construct(
        private string $title,
        #[ORM\Column(length: 255)]
        private string $description,
        #[ORM\Column(length: 255)]
        private string $banner
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getOng(): Ong
    {
        return $this->ong;
    }
    public function addOng(Ong $ong): static
    {
        $this->ong = $ong;

        return $this;
    }
    public function getUser(): User
    {
        return $this->user;
    }
    public function addUser(User $user): static
    {
        $this->user = $user;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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
}
