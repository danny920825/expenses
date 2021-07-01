<?php

namespace App\Entity;

use App\Repository\CategoriasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriasRepository::class)
 */
class Categorias
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=Operacion::class, mappedBy="categoria")
     */
    private $operaciones;

    public function __construct()
    {
        $this->operaciones = new ArrayCollection();
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

    /**
     * @return Collection|Operacion[]
     */
    public function getOperaciones(): Collection
    {
        return $this->operaciones;
    }

    public function addOperacione(Operacion $operacione): self
    {
        if (!$this->operaciones->contains($operacione)) {
            $this->operaciones[] = $operacione;
            $operacione->setCategoria($this);
        }

        return $this;
    }

    public function removeOperacione(Operacion $operacione): self
    {
        if ($this->operaciones->removeElement($operacione)) {
            // set the owning side to null (unless already changed)
            if ($operacione->getCategoria() === $this) {
                $operacione->setCategoria(null);
            }
        }

        return $this;
    }


}
