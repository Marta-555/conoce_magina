<?php

namespace App\Entity;

use App\Repository\EmpresaTurismoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpresaTurismoRepository::class)]
class EmpresaTurismo
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

    #[ORM\ManyToOne(targetEntity: TipoEmpresa::class, inversedBy: 'empresasTurismo')]
    #[ORM\JoinColumn(nullable: false)]
    private $tipoEmpresa;

    #[ORM\OneToMany(mappedBy: 'empresa', targetEntity: VisitaGuiada::class, orphanRemoval: true)]
    private $visitasGuiadas;

    #[ORM\OneToMany(mappedBy: 'empresa', targetEntity: ActividadOcio::class, orphanRemoval: true)]
    private $actividadesOcio;

    public function __construct()
    {
        $this->visitasGuiadas = new ArrayCollection();
        $this->actividadesOcio = new ArrayCollection();
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

    public function getTipoEmpresa(): ?TipoEmpresa
    {
        return $this->tipoEmpresa;
    }

    public function setTipoEmpresa(?TipoEmpresa $tipoEmpresa): self
    {
        $this->tipoEmpresa = $tipoEmpresa;

        return $this;
    }

    /**
     * @return Collection<int, VisitaGuiada>
     */
    public function getVisitasGuiadas(): Collection
    {
        return $this->visitasGuiadas;
    }

    public function addVisitasGuiada(VisitaGuiada $visitasGuiada): self
    {
        if (!$this->visitasGuiadas->contains($visitasGuiada)) {
            $this->visitasGuiadas[] = $visitasGuiada;
            $visitasGuiada->setEmpresa($this);
        }

        return $this;
    }

    public function removeVisitasGuiada(VisitaGuiada $visitasGuiada): self
    {
        if ($this->visitasGuiadas->removeElement($visitasGuiada)) {
            // set the owning side to null (unless already changed)
            if ($visitasGuiada->getEmpresa() === $this) {
                $visitasGuiada->setEmpresa(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ActividadOcio>
     */
    public function getActividadesOcio(): Collection
    {
        return $this->actividadesOcio;
    }

    public function addActividadesOcio(ActividadOcio $actividadesOcio): self
    {
        if (!$this->actividadesOcio->contains($actividadesOcio)) {
            $this->actividadesOcio[] = $actividadesOcio;
            $actividadesOcio->setEmpresa($this);
        }

        return $this;
    }

    public function removeActividadesOcio(ActividadOcio $actividadesOcio): self
    {
        if ($this->actividadesOcio->removeElement($actividadesOcio)) {
            // set the owning side to null (unless already changed)
            if ($actividadesOcio->getEmpresa() === $this) {
                $actividadesOcio->setEmpresa(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
