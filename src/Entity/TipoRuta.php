<?php

namespace App\Entity;

use App\Repository\TipoRutaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoRutaRepository::class)]
class TipoRuta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $descripcion;

    #[ORM\ManyToMany(targetEntity: Ruta::class, mappedBy: 'tipoRuta')]
    private $rutas;

    public function __construct()
    {
        $this->rutas = new ArrayCollection();
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
            $ruta->addTipoRuta($this);
        }

        return $this;
    }

    public function removeRuta(Ruta $ruta): self
    {
        if ($this->rutas->removeElement($ruta)) {
            $ruta->removeTipoRuta($this);
        }

        return $this;
    }
}
