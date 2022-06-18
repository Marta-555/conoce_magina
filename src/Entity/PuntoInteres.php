<?php

namespace App\Entity;

use App\Repository\PuntoInteresRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PuntoInteresRepository::class)]
class PuntoInteres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $titulo;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank]
    private $descripcion;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $coordenadas;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $foto;

    #[ORM\ManyToOne(targetEntity: Ruta::class, inversedBy: 'puntoInteres')]
    #[ORM\JoinColumn(nullable: false)]
    private $ruta;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'puntoInteres')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: 'datetime')]
    private $fecha_publicacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

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

    public function getCoordenadas(): ?string
    {
        return $this->coordenadas;
    }

    public function setCoordenadas(string $coordenadas): self
    {
        $this->coordenadas = $coordenadas;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function getFotoUrl(): ?string
    {
        if (!$this->foto) {
            return null;
        }
        if (strpos($this->foto, '/') !== false) {
            return $this->foto;
        }

        return sprintf('images/uploads-pInteres/%s', $this->foto);
    }

    public function setFoto(string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getRuta(): ?Ruta
    {
        return $this->ruta;
    }

    public function setRuta(?Ruta $ruta): self
    {
        $this->ruta = $ruta;

        return $this;
    }

    public function __toString()
    {
        return $this->titulo;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getFechaPublicacion(): ?\DateTimeInterface
    {
        return $this->fecha_publicacion;
    }

    public function setFechaPublicacion(\DateTimeInterface $fecha_publicacion): self
    {
        $this->fecha_publicacion = $fecha_publicacion;

        return $this;
    }

}
