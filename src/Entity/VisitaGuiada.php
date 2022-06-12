<?php

namespace App\Entity;

use App\Repository\VisitaGuiadaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisitaGuiadaRepository::class)]
class VisitaGuiada
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nombre;

    #[ORM\Column(type: 'string', length: 1000)]
    private $descripcion;

    #[ORM\Column(type: 'float')]
    private $precio;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\ManyToOne(targetEntity: EmpresaTurismo::class, inversedBy: 'visitasGuiadas')]
    #[ORM\JoinColumn(nullable: false)]
    private $empresa;

    #[ORM\ManyToOne(targetEntity: Municipio::class, inversedBy: 'visitaGuiadas')]
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

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

        return sprintf('images/uploads-vGuiada/%s', $this->image);
    }


    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEmpresa(): ?EmpresaTurismo
    {
        return $this->empresa;
    }

    public function setEmpresa(?EmpresaTurismo $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
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
}
