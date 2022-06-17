<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Ya existe una cuenta con este correo')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    const ROLE_ADMIN = 'ROLE_ADMIN';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Email()]
    private $email;

    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $surname;

    #[ORM\Column(type: 'datetime')]
    private $fecha_registro;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'boolean')]
    private $active;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Ruta::class, orphanRemoval: true)]
    private $rutas;

    public function __construct()
    {
        $this->rutas = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fecha_registro;
    }

    public function setFechaRegistro(\DateTimeInterface $fecha_registro): self
    {
        $this->fecha_registro = $fecha_registro;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getImageUrl(): ?string
    {
        if (!$this->image) {
            return null;
        }
        if (strpos($this->image, '/') !== false) {
            return $this->image;
        }

        return sprintf('images/uploads-user/%s', $this->image);
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function isAdmin(): bool
    {
        return in_array(self::ROLE_ADMIN, $this->getRoles());
    }

    public function __toString()
    {
        return $this->email;
    }

    /**
     * @return Collection<int, Ruta>
     */
    public function getRutas(): Collection
    {
        return $this->rutas;
    }

    public function addRuta(Ruta $ruta): self
    {
        if (!$this->rutas->contains($ruta)) {
            $this->rutas[] = $ruta;
            $ruta->setUser($this);
        }

        return $this;
    }

    public function removeRuta(Ruta $ruta): self
    {
        if ($this->rutas->removeElement($ruta)) {
            // set the owning side to null (unless already changed)
            if ($ruta->getUser() === $this) {
                $ruta->setUser(null);
            }
        }

        return $this;
    }

}
