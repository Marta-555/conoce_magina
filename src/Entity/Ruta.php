<?php

namespace App\Entity;

use App\Entity\TipoRuta;
use App\Entity\Municipio;
use App\Entity\PuntoInteres;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\RutaRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RutaRepository::class)]
class Ruta
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
    private $dificultad;

    #[ORM\Column(type: 'float')]
    #[Assert\NotBlank]
    private $longitud;

    #[ORM\Column(type: 'float')]
    #[Assert\NotBlank]
    private $tiempo;

    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank]
    #[Assert\Url]
    private $mapa;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $desnivel;

    #[ORM\Column(type: 'string', length: 1000)]
    #[Assert\NotBlank]
    private $descripcion;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\OneToMany(mappedBy: 'ruta', targetEntity: PuntoInteres::class, orphanRemoval: true)]
    private $puntoInteres;

    #[ORM\ManyToOne(targetEntity: Municipio::class, inversedBy: 'rutas')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private $municipio;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'rutas')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: 'datetime')]
    private $fecha_publicacion;

    #[ORM\ManyToOne(targetEntity: TipoRuta::class, inversedBy: 'rutas')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private $tipoRuta;

    public function __construct()
    {
        $this->puntoInteres = new ArrayCollection();
    }

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

    public function getDificultad(): ?string
    {
        return $this->dificultad;
    }

    public function setDificultad(string $dificultad): self
    {
        $this->dificultad = $dificultad;

        return $this;
    }

    public function getLongitud(): ?string
    {
        return $this->longitud;
    }

    public function setLongitud(string $longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }

    public function getTiempo(): ?string
    {
        return $this->tiempo;
    }

    public function setTiempo(string $tiempo): self
    {
        $this->tiempo = $tiempo;

        return $this;
    }

    public function getMapa(): ?string
    {
        return $this->mapa;
    }

    public function setMapa(string $mapa): self
    {
        $this->mapa = $mapa;

        return $this;
    }

    public function getDesnivel(): ?string
    {
        return $this->desnivel;
    }

    public function setDesnivel(string $desnivel): self
    {
        $this->desnivel = $desnivel;

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

        return sprintf('images/uploads-ruta/%s', $this->image);
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, PuntoInteres>
     */
    public function getPuntoInteres(): Collection
    {
        return $this->puntoInteres;
    }

    public function addPuntoIntere(PuntoInteres $puntoIntere): self
    {
        if (!$this->puntoInteres->contains($puntoIntere)) {
            $this->puntoInteres[] = $puntoIntere;
            $puntoIntere->setRuta($this);
        }

        return $this;
    }

    public function removePuntoIntere(PuntoInteres $puntoIntere): self
    {
        if ($this->puntoInteres->removeElement($puntoIntere)) {
            // set the owning side to null (unless already changed)
            if ($puntoIntere->getRuta() === $this) {
                $puntoIntere->setRuta(null);
            }
        }

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

    public function getTipoRuta(): ?TipoRuta
    {
        return $this->tipoRuta;
    }

    public function setTipoRuta(?TipoRuta $tipoRuta): self
    {
        $this->tipoRuta = $tipoRuta;

        return $this;
    }

    public function __toString()
    {
        return $this->titulo;
    }
}
