<?php

namespace App\Entity;

use App\Repository\TipoEmpresaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoEmpresaRepository::class)]
class TipoEmpresa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $descripcion;

    #[ORM\OneToMany(mappedBy: 'tipoEmpresa', targetEntity: EmpresaTurismo::class, orphanRemoval: true)]
    private $empresasTurismo;

    public function __construct()
    {
        $this->empresasTurismo = new ArrayCollection();
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
            $empresasTurismo->setTipoEmpresa($this);
        }

        return $this;
    }

    public function removeEmpresasTurismo(EmpresaTurismo $empresasTurismo): self
    {
        if ($this->empresasTurismo->removeElement($empresasTurismo)) {
            // set the owning side to null (unless already changed)
            if ($empresasTurismo->getTipoEmpresa() === $this) {
                $empresasTurismo->setTipoEmpresa(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->descripcion;
    }
}
