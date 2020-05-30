<?php

namespace App\Service;


use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class HomePageService
{
    private $em;
    private $usuarioRepo;

    public function __construct(EntityManagerInterface $entityManager,UsuarioRepository $usuarioRepository)
    {
        $this->em = $entityManager;
        $this->usuarioRepo = $usuarioRepository;
    }

    public function createAccount($request)
    {
        try {
            $this->comprobeUsernameExists($request['username']);
            $this->comprobeEmailExists($request['email']);
            $this->comprobeDniExist($request['dni']);
            return $this->usuarioRepo->create($request);
        }catch (\Exception $exception){
            return ['error'=>$exception->getMessage(),'code'=>$exception->getCode()];
        }
    }

    public function login($request)
    {
        try{
            return $this->usuarioRepo->login($request);
        }catch (\Exception $exception) {
            return ['error'=>$exception->getMessage(),'code'=>$exception->getCode()];
        }
    }
    public function comprobeUsernameExists($username)
    {
        if (!empty($this->usuarioRepo->findOneBy((['username' =>$username])))) {
            throw new \Exception('El nombre de usuario ya existe',500);
        }
    }

    public function comprobeEmailExists($email)
    {
        if (!empty($this->usuarioRepo->findOneBy(['email' =>$email]))) {
            throw new \Exception('El email ingresado ya existe en el sistema',500);
        }
    }

    public function comprobeDniExist($dni)
    {
        if (!empty($this->usuarioRepo->findOneBy(['dni' =>$dni]))) {
            throw new \Exception('El DNI ingresado ya existe',500);
        }
    }

}