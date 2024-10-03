<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`users`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ManyToMany(targetEntity: Ong::class, mappedBy: 'users')]
    private Collection $ongs;

    #[ORM\OneToMany(targetEntity: Post::class, mappedBy: 'user_id', orphanRemoval: true)]
    private Collection $posts;


    public function __construct(
        #[ORM\Column(length: 255)]
        private string $name,

        #[ORM\Column(length: 255)]
        private string $email,

        #[ORM\Column(length: 255)]
        private string $password,

        #[ORM\Column(length: 255)]
        private string $phone,

        #[ORM\Column(length: 255)]
        private string $role
    ) {
        $this->ongs = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post)
    {
        if ($this->posts->contains($post)) {
            return;
        }
        $this->posts->add($post);
        $post->addUser($this);
    }
    public function getOngs(): Collection
    {
        return $this->ongs;
    }
    public function addOng(Ong $ong)
    {
        if ($this->ongs->contains($ong)) {
            return;
        }
        $this->ongs->add($ong);
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }
}
