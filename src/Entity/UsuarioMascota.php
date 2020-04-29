<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioMascotaRepository")
 */
class UsuarioMascota
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\usuario")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_usuario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\mascota")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_mascota;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_creacion;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_modificacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsuario(): ?usuario
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(?usuario $id_usuario): self
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getIdMascota(): ?mascota
    {
        return $this->id_mascota;
    }

    public function setIdMascota(?mascota $id_mascota): self
    {
        $this->id_mascota = $id_mascota;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fecha_creacion): self
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }

    public function getFechaModificacion(): ?\DateTimeInterface
    {
        return $this->fecha_modificacion;
    }

    public function setFechaModificacion(?\DateTimeInterface $fecha_modificacion): self
    {
        $this->fecha_modificacion = $fecha_modificacion;

        return $this;
    }
}
