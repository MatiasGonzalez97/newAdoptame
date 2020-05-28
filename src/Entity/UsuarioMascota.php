<?php

namespace App\Entity;

use App\Repository\UsuarioMascotaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioMascotaRepository::class)
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
     * @ORM\ManyToOne(targetEntity=usuario::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity=mascota::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $mascota;

    /**
     * @ORM\OneToMany(targetEntity=Fotos::class, mappedBy="usuario_mascota")
     */
    private $no;

    public function __construct()
    {
        $this->no = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getMascota(): ?mascota
    {
        return $this->mascota;
    }

    public function setMascota(?mascota $mascota): self
    {
        $this->mascota = $mascota;

        return $this;
    }
}
