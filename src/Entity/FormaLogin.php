<?php

namespace App\Entity;

use App\Repository\FormaLoginRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormaLoginRepository::class)
 */
class FormaLogin
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
     * @ORM\ManyToOne(targetEntity=LoginWay::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $loginWay;

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

    public function getLoginWay(): ?LoginWay
    {
        return $this->loginWay;
    }

    public function setLoginWay(?LoginWay $loginWay): self
    {
        $this->loginWay = $loginWay;

        return $this;
    }
}
