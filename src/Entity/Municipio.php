<?php

namespace App\Entity;

use App\Entity\Ruta;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MunicipioRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

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
    private $habitantes;

    #[ORM\Column(type: 'integer')]
    private $altitud;

    #[ORM\Column(type: 'float')]
    private $superficie;

    #[ORM\Column(type: 'float')]
    private $latitud;

    #[ORM\Column(type: 'float')]
    private $longitud;

    #[ORM\OneToMany(mappedBy: 'municipio', targetEntity: Alojamiento::class, orphanRemoval: true)]
    private $alojamientos;

    #[ORM\OneToMany(mappedBy: 'municipio', targetEntity: Restaurante::class, orphanRemoval: true)]
    private $restaurantes;

    #[ORM\OneToMany(mappedBy: 'municipio', targetEntity: Pub::class, orphanRemoval: true)]
    private $pubs;

    #[ORM\OneToMany(mappedBy: 'municipio', targetEntity: ActividadOcio::class, orphanRemoval: true)]
    private $actividadOcios;

    #[ORM\OneToMany(mappedBy: 'municipio', targetEntity: VisitaGuiada::class, orphanRemoval: true)]
    private $visitaGuiadas;

    #[ORM\OneToMany(mappedBy: 'municipio', targetEntity: Ruta::class, orphanRemoval: true)]
    private $rutas;

    public function __construct()
    {
        $this->alojamientos = new ArrayCollection();
        $this->restaurantes = new ArrayCollection();
        $this->pubs = new ArrayCollection();
        $this->actividadOcios = new ArrayCollection();
        $this->visitaGuiadas = new ArrayCollection();
        $this->rutas = new ArrayCollection();
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

    public function getHabitantes(): ?int
    {
        return $this->habitantes;
    }

    public function setHabitantes(int $habitantes): self
    {
        $this->habitantes = $habitantes;

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

    public function getLatitud(): ?float
    {
        return $this->latitud;
    }

    public function setLatitud(float $latitud): self
    {
        $this->latitud = $latitud;

        return $this;
    }

    public function getLongitud(): ?float
    {
        return $this->longitud;
    }

    public function setLongitud(float $longitud): self
    {
        $this->longitud = $longitud;

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
            $alojamiento->setMunicipio($this);
        }

        return $this;
    }

    public function removeAlojamiento(Alojamiento $alojamiento): self
    {
        if ($this->alojamientos->removeElement($alojamiento)) {
            // set the owning side to null (unless already changed)
            if ($alojamiento->getMunicipio() === $this) {
                $alojamiento->setMunicipio(null);
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
            $restaurante->setMunicipio($this);
        }

        return $this;
    }

    public function removeRestaurante(Restaurante $restaurante): self
    {
        if ($this->restaurantes->removeElement($restaurante)) {
            // set the owning side to null (unless already changed)
            if ($restaurante->getMunicipio() === $this) {
                $restaurante->setMunicipio(null);
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
            $pub->setMunicipio($this);
        }

        return $this;
    }

    public function removePub(Pub $pub): self
    {
        if ($this->pubs->removeElement($pub)) {
            // set the owning side to null (unless already changed)
            if ($pub->getMunicipio() === $this) {
                $pub->setMunicipio(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }

    /**
     * @return Collection<int, ActividadOcio>
     */
    public function getActividadOcios(): Collection
    {
        return $this->actividadOcios;
    }

    public function addActividadOcio(ActividadOcio $actividadOcio): self
    {
        if (!$this->actividadOcios->contains($actividadOcio)) {
            $this->actividadOcios[] = $actividadOcio;
            $actividadOcio->setMunicipio($this);
        }

        return $this;
    }

    public function removeActividadOcio(ActividadOcio $actividadOcio): self
    {
        if ($this->actividadOcios->removeElement($actividadOcio)) {
            // set the owning side to null (unless already changed)
            if ($actividadOcio->getMunicipio() === $this) {
                $actividadOcio->setMunicipio(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, VisitaGuiada>
     */
    public function getVisitaGuiadas(): Collection
    {
        return $this->visitaGuiadas;
    }

    public function addVisitaGuiada(VisitaGuiada $visitaGuiada): self
    {
        if (!$this->visitaGuiadas->contains($visitaGuiada)) {
            $this->visitaGuiadas[] = $visitaGuiada;
            $visitaGuiada->setMunicipio($this);
        }

        return $this;
    }

    public function removeVisitaGuiada(VisitaGuiada $visitaGuiada): self
    {
        if ($this->visitaGuiadas->removeElement($visitaGuiada)) {
            // set the owning side to null (unless already changed)
            if ($visitaGuiada->getMunicipio() === $this) {
                $visitaGuiada->setMunicipio(null);
            }
        }

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
            $ruta->setMunicipio($this);
        }

        return $this;
    }

    public function removeRuta(Ruta $ruta): self
    {
        if ($this->rutas->removeElement($ruta)) {
            // set the owning side to null (unless already changed)
            if ($ruta->getMunicipio() === $this) {
                $ruta->setMunicipio(null);
            }
        }

        return $this;
    }
}
