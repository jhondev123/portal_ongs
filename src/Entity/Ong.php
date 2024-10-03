<?php

namespace App\Entity;

use App\Entity\Phone;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OngRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: OngRepository::class)]
class Ong
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



    #[ORM\OneToOne(targetEntity: Address::class, mappedBy: 'ong_id', orphanRemoval: true)]
    private Collection $address;

    #[ORM\OneToMany(targetEntity: Phone::class, mappedBy: 'ong_id', orphanRemoval: true)]
    private Collection $phone;

    #[ORM\ManyToMany(targetEntity: Ativit::class, inversedBy: 'ong')]
    private Collection $ativit;

    #[ORM\OneToMany(targetEntity: Document::class, mappedBy: 'ong_id', orphanRemoval: true)]
    private Collection $document;

    #[ORM\OneToOne(targetEntity: PageTemplates::class, mappedBy: 'ong_id', orphanRemoval: true)]
    private PageTemplates|null $pageTemplate = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'ongs')]
    private Collection $users;

    #[ORM\OneToMany(targetEntity: Post::class, mappedBy: 'ong_id', orphanRemoval: true)]
    private Collection $posts;

    public function __construct(
        #[ORM\Column(length: 255)]
        private string $name,

        #[ORM\Column(nullable: true)]
        private int $user_id,

        #[ORM\Column(length: 255)]
        private string $cpf_cnpj,

        #[ORM\Column(length: 255)]
        private string $responsible_name,

        #[ORM\Column(length: 255)]
        private string $responsible_role,

        #[ORM\Column(length: 255)]
        private string $email,

        #[ORM\Column(length: 255, nullable: true)]
        private ?string $instagram = null,

        #[ORM\Column(length: 255, nullable: true)]
        private ?string $facebook = null,

        #[ORM\Column(length: 255, nullable: true)]
        private ?string $youtube = null,
    ) {
        $this->address = new ArrayCollection();
        $this->phone = new ArrayCollection();
        $this->ativit = new ArrayCollection();
        $this->document = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

    public function getPosts(): Collection
    {
        return $this->posts;
    }
    public function addPost(Post $post): void
    {
        if ($this->posts->contains($post)) {
            return;
        }
        $this->posts->add($post);
        $post->addOng($this);
    }
    public function getUsers(): Collection
    {
        return $this->users;
    }
    public function addUser(User $user): void
    {
        if ($this->users->contains($user)) {
            return;
        }
        $this->users->add($user);
        $user->addOng($this);
    }
    public function getPageTemplate(): PageTemplates
    {
        return $this->pageTemplate;
    }

    public function getDocument(): Collection
    {
        return $this->document;
    }
    public function addDocument(Document $document)
    {
        $this->document->add($document);
        $document->setOngId($this->id);
    }


    public function getAddress(): Collection
    {
        return $this->address;
    }
    public function getPhone(): Collection
    {
        return $this->phone;
    }

    public function addPhone(Phone $phone): void
    {
        $this->phone->add($phone);
        $phone->setOngId($this->id);
    }


    public function addAddress(Address $address): void
    {
        $this->address->add($address);
        $address->setOngId($this->id);
    }

    public function getAtivit(): Collection
    {
        return $this->ativit;
    }
    public function addAtivit(Ativit $ativit): void
    {
        if ($this->ativit->contains($ativit)) {
            return;
        }
        $this->ativit->add($ativit);
        $ativit->addOng($this);
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

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getCpfCnpj(): ?string
    {
        return $this->cpf_cnpj;
    }

    public function setCpfCnpj(string $cpf_cnpj): static
    {
        $this->cpf_cnpj = $cpf_cnpj;

        return $this;
    }

    public function getResponsibleName(): ?string
    {
        return $this->responsible_name;
    }

    public function setResponsibleName(string $responsible_name): static
    {
        $this->responsible_name = $responsible_name;

        return $this;
    }

    public function getResponsibleRole(): ?string
    {
        return $this->responsible_role;
    }

    public function setResponsibleRole(string $responsible_role): static
    {
        $this->responsible_role = $responsible_role;

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

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): static
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): static
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(?string $youtube): static
    {
        $this->youtube = $youtube;

        return $this;
    }
}
