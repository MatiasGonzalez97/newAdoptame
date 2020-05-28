<?php

namespace App\Entity;

use App\Repository\MascotaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MascotaRepository::class)
 */
class Mascota
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="integer")
     */
    private $edad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $esterilizacion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vacunas;

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

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getEsterilizacion(): ?string
    {
        return $this->esterilizacion;
    }

    public function setEsterilizacion(string $esterilizacion): self
    {
        $this->esterilizacion = $esterilizacion;

        return $this;
    }

    public function getVacunas(): ?bool
    {
        return $this->vacunas;
    }

    public function setVacunas(bool $vacunas): self
    {
        $this->vacunas = $vacunas;

        return $this;
    }
}
