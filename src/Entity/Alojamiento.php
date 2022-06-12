<?php

namespace App\Entity;

use App\Repository\AlojamientoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlojamientoRepository::class)]
class Alojamiento
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
    private $telefono_1;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $telefono_2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pagina_web;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\ManyToOne(targetEntity: Categoria::class, inversedBy: 'alojamientos')]
    #[ORM\JoinColumn(nullable: false)]
    private $categoria;

    #[ORM\ManyToOne(targetEntity: Municipio::class, inversedBy: 'alojamientos')]
    #[ORM\JoinColumn(nullable: false)]
    private $municipio;

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

    public function getTelefono1(): ?int
    {
        return $this->telefono_1;
    }

    public function setTelefono1(int $telefono_1): self
    {
        $this->telefono_1 = $telefono_1;

        return $this;
    }

    public function getTelefono2(): ?int
    {
        return $this->telefono_2;
    }

    public function setTelefono2(int $telefono_2): self
    {
        $this->telefono_2 = $telefono_2;

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

    public function getImageUrl(): ?string
    {
        if (!$this->image) {
            return null;
        }
        if (strpos($this->image, '/') !== false) {
            return $this->image;
        }

        return sprintf('images/uploads-alojamiento/%s', $this->image);
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

    public function getMunicipio(): ?Municipio
    {
        return $this->municipio;
    }

    public function setMunicipio(?Municipio $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
