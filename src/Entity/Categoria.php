<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriaRepository::class)]
class Categoria
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $descripcion;

    #[ORM\OneToMany(mappedBy: 'categoria', targetEntity: Alojamiento::class)]
    private $alojamientos;

    #[ORM\OneToMany(mappedBy: 'categoria', targetEntity: Restaurante::class, orphanRemoval: true)]
    private $restaurantes;

    #[ORM\OneToMany(mappedBy: 'categoria', targetEntity: Pub::class, orphanRemoval: true)]
    private $pubs;

    public function __construct()
    {
        $this->alojamientos = new ArrayCollection();
        $this->restaurantes = new ArrayCollection();
        $this->pubs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $alojamiento->setCategoria($this);
        }

        return $this;
    }

    public function removeAlojamiento(Alojamiento $alojamiento): self
    {
        if ($this->alojamientos->removeElement($alojamiento)) {
            // set the owning side to null (unless already changed)
            if ($alojamiento->getCategoria() === $this) {
                $alojamiento->setCategoria(null);
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
            $restaurante->setCategoria($this);
        }

        return $this;
    }

    public function removeRestaurante(Restaurante $restaurante): self
    {
        if ($this->restaurantes->removeElement($restaurante)) {
            // set the owning side to null (unless already changed)
            if ($restaurante->getCategoria() === $this) {
                $restaurante->setCategoria(null);
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
            $pub->setCategoria($this);
        }

        return $this;
    }

    public function removePub(Pub $pub): self
    {
        if ($this->pubs->removeElement($pub)) {
            // set the owning side to null (unless already changed)
            if ($pub->getCategoria() === $this) {
                $pub->setCategoria(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->descripcion;
    }
}
