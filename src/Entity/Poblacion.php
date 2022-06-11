<?php

namespace App\Entity;

use App\Repository\PoblacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PoblacionRepository::class)]
class Poblacion
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
    private $habitantes;

    #[ORM\ManyToOne(targetEntity: Municipio::class, inversedBy: 'poblaciones')]
    #[ORM\JoinColumn(nullable: false)]
    private $municipio;

    #[ORM\OneToMany(mappedBy: 'poblacion', targetEntity: Alojamiento::class, orphanRemoval: true)]
    private $alojamientos;

    #[ORM\OneToMany(mappedBy: 'poblacion', targetEntity: Restaurante::class, orphanRemoval: true)]
    private $restaurantes;

    #[ORM\OneToMany(mappedBy: 'poblacion', targetEntity: Pub::class, orphanRemoval: true)]
    private $pubs;

    #[ORM\OneToMany(mappedBy: 'poblacion', targetEntity: EmpresaTurismo::class, orphanRemoval: true)]
    private $empresasTurismo;

    public function __construct()
    {
        $this->alojamientos = new ArrayCollection();
        $this->restaurantes = new ArrayCollection();
        $this->pubs = new ArrayCollection();
        $this->empresasTurismo = new ArrayCollection();
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

    public function getHabitantes(): ?int
    {
        return $this->habitantes;
    }

    public function setHabitantes(int $habitantes): self
    {
        $this->habitantes = $habitantes;

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

    /**
     * @return Collection<int, Alojamiento>
     */
    public function getAlojamientos(): Collection
    {
        return $this->alojamientos;
    }

    public function addAlojamiento(Alojamiento $alojamiento): self
    {
        if (!$this->alojamientos->contains($alojamiento)) {
            $this->alojamientos[] = $alojamiento;
            $alojamiento->setPoblacion($this);
        }

        return $this;
    }

    public function removeAlojamiento(Alojamiento $alojamiento): self
    {
        if ($this->alojamientos->removeElement($alojamiento)) {
            // set the owning side to null (unless already changed)
            if ($alojamiento->getPoblacion() === $this) {
                $alojamiento->setPoblacion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Restaurante>
     */
    public function getRestaurantes(): Collection
    {
        return $this->restaurantes;
    }

    public function addRestaurante(Restaurante $restaurante): self
    {
        if (!$this->restaurantes->contains($restaurante)) {
            $this->restaurantes[] = $restaurante;
            $restaurante->setPoblacion($this);
        }

        return $this;
    }

    public function removeRestaurante(Restaurante $restaurante): self
    {
        if ($this->restaurantes->removeElement($restaurante)) {
            // set the owning side to null (unless already changed)
            if ($restaurante->getPoblacion() === $this) {
                $restaurante->setPoblacion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Pub>
     */
    public function getPubs(): Collection
    {
        return $this->pubs;
    }

    public function addPub(Pub $pub): self
    {
        if (!$this->pubs->contains($pub)) {
            $this->pubs[] = $pub;
            $pub->setPoblacion($this);
        }

        return $this;
    }

    public function removePub(Pub $pub): self
    {
        if ($this->pubs->removeElement($pub)) {
            // set the owning side to null (unless already changed)
            if ($pub->getPoblacion() === $this) {
                $pub->setPoblacion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EmpresaTurismo>
     */
    public function getEmpresasTurismo(): Collection
    {
        return $this->empresasTurismo;
    }

    public function addEmpresasTurismo(EmpresaTurismo $empresasTurismo): self
    {
        if (!$this->empresasTurismo->contains($empresasTurismo)) {
            $this->empresasTurismo[] = $empresasTurismo;
            $empresasTurismo->setPoblacion($this);
        }

        return $this;
    }

    public function removeEmpresasTurismo(EmpresaTurismo $empresasTurismo): self
    {
        if ($this->empresasTurismo->removeElement($empresasTurismo)) {
            // set the owning side to null (unless already changed)
            if ($empresasTurismo->getPoblacion() === $this) {
                $empresasTurismo->setPoblacion(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
