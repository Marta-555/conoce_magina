<?php

namespace App\Entity;

use App\Repository\PubRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PubRepository::class)]
class Pub
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nombre;

    #[ORM\Column(type: 'string', length: 255)]
    private $direccion;

    #[ORM\Column(type: 'integer')]
    private $telefono;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pagina_web;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\ManyToOne(targetEntity: Categoria::class, inversedBy: 'pubs')]
    #[ORM\JoinColumn(nullable: false)]
    private $categoria;

    #[ORM\ManyToOne(targetEntity: Poblacion::class, inversedBy: 'pubs')]
    #[ORM\JoinColumn(nullable: false)]
    private $poblacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?int
    {
        return $this->telefono;
    }

    public function setTelefono(int $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getPaginaWeb(): ?string
    {
        return $this->pagina_web;
    }

    public function setPaginaWeb(?string $pagina_web): self
    {
        $this->pagina_web = $pagina_web;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getPoblacion(): ?Poblacion
    {
        return $this->poblacion;
    }

    public function setPoblacion(?Poblacion $poblacion): self
    {
        $this->poblacion = $poblacion;

        return $this;
    }
}
