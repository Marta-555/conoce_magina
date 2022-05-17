<?php

namespace App\Entity;

use App\Repository\RutaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RutaRepository::class)]
class Ruta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $dificultad;

    #[ORM\Column(type: 'string', length: 255)]
    private $longitud;

    #[ORM\Column(type: 'string', length: 255)]
    private $tiempo;

    #[ORM\Column(type: 'text')]
    private $coordenadas;

    #[ORM\Column(type: 'string', length: 255)]
    private $desnivel;

    #[ORM\Column(type: 'string', length: 1000)]
    private $descripcion;

    #[ORM\OneToMany(mappedBy: 'ruta', targetEntity: PuntoInteres::class, orphanRemoval: true)]
    private $puntoInteres;

    #[ORM\ManyToMany(targetEntity: TipoRuta::class, inversedBy: 'rutas')]
    private $tipoRuta;

    public function __construct()
    {
        $this->puntoInteres = new ArrayCollection();
        $this->tipoRuta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCoordenadas(): ?string
    {
        return $this->coordenadas;
    }

    public function setCoordenadas(string $coordenadas): self
    {
        $this->coordenadas = $coordenadas;

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

    /**
     * @return Collection<int, TipoRuta>
     */
    public function getTipoRuta(): Collection
    {
        return $this->tipoRuta;
    }

    public function addTipoRutum(TipoRuta $tipoRutum): self
    {
        if (!$this->tipoRuta->contains($tipoRutum)) {
            $this->tipoRuta[] = $tipoRutum;
        }

        return $this;
    }

    public function removeTipoRutum(TipoRuta $tipoRutum): self
    {
        $this->tipoRuta->removeElement($tipoRutum);

        return $this;
    }
}
