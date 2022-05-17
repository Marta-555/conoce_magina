<?php

namespace App\Entity;

use App\Repository\MunicipioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MunicipioRepository::class)]
class Municipio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nombre;

    #[ORM\Column(type: 'integer')]
    private $codigo_postal;

    #[ORM\Column(type: 'integer')]
    private $altitud;

    #[ORM\Column(type: 'float')]
    private $superficie;

    #[ORM\Column(type: 'integer')]
    private $latitud;

    #[ORM\Column(type: 'integer')]
    private $longitud;

    #[ORM\OneToMany(mappedBy: 'municipio', targetEntity: Poblacion::class, orphanRemoval: true)]
    private $poblaciones;

    public function __construct()
    {
        $this->poblaciones = new ArrayCollection();
    }

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

    public function getCodigoPostal(): ?int
    {
        return $this->codigo_postal;
    }

    public function setCodigoPostal(int $codigo_postal): self
    {
        $this->codigo_postal = $codigo_postal;

        return $this;
    }

    public function getAltitud(): ?int
    {
        return $this->altitud;
    }

    public function setAltitud(int $altitud): self
    {
        $this->altitud = $altitud;

        return $this;
    }

    public function getSuperficie(): ?float
    {
        return $this->superficie;
    }

    public function setSuperficie(float $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getLatitud(): ?int
    {
        return $this->latitud;
    }

    public function setLatitud(int $latitud): self
    {
        $this->latitud = $latitud;

        return $this;
    }

    public function getLongitud(): ?int
    {
        return $this->longitud;
    }

    public function setLongitud(int $longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * @return Collection<int, Poblacion>
     */
    public function getPoblaciones(): Collection
    {
        return $this->poblaciones;
    }

    public function addPoblacione(Poblacion $poblacione): self
    {
        if (!$this->poblaciones->contains($poblacione)) {
            $this->poblaciones[] = $poblacione;
            $poblacione->setMunicipio($this);
        }

        return $this;
    }

    public function removePoblacione(Poblacion $poblacione): self
    {
        if ($this->poblaciones->removeElement($poblacione)) {
            // set the owning side to null (unless already changed)
            if ($poblacione->getMunicipio() === $this) {
                $poblacione->setMunicipio(null);
            }
        }

        return $this;
    }
}
