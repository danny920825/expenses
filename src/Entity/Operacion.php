<?php

namespace App\Entity;

use App\Repository\OperacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperacionRepository::class)
 */
class Operacion
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
    private $tipo;

    /**
     * @ORM\Column(type="float")
     */
    private $cantidad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity=Categorias::class, inversedBy="operaciones")
     */
    private $categoria;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Moneda;

    /**
     *  @ORM\Column(type="string", length=255)
     */
    private $fecha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getCantidad(): ?float
    {
        return $this->cantidad;
    }

    public function setCantidad(float $cantidad): self
    {
        $this->cantidad = $cantidad;

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

    public function getCategoria(): ?Categorias
    {
        return $this->categoria;
    }

    public function setCategoria(?Categorias $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getMoneda(): ?string
    {
        return $this->Moneda;
    }

    public function setMoneda(string $Moneda): self
    {
        $this->Moneda = $Moneda;

        return $this;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
}
