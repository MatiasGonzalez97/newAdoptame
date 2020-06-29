<?php

namespace App\Repository;

use App\Entity\FormaLogin;
use App\Entity\LoginWay;
use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Usuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuario[]    findAll()
 * @method Usuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuario::class);
    }

    public function create($infoUser){
        try{
            $this->_em->beginTransaction();
            $user = new Usuario();
            $user->setNombre($infoUser['nombre'])
                ->setDni($infoUser['dni'])
                ->setEmail($infoUser['email'])
                ->setApellido($infoUser['apellido'])
                ->setUsername($infoUser['username'])
                ->setPassword($infoUser['password'])
                ->setLogin(0)
                ->setIdentificadorLogin('null')
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime());
            $this->save($user);
            return $user->getId();
        }catch (\Exception $exception){
            $this->_em->rollback();
            return $exception;
        }
    }

    public function login($loginData)
    {
        try{
            if(!isset($loginData['password']) && (!isset($loginData['dni']) || !isset($loginData['email']))) {
                throw new \Exception('No se ha podido loguear fijese en los datos enviados',500);
            }
            $login = new FormaLogin();
            if(isset($loginData['dni'])) {
                $success = $this->findOneBy(['dni' => $loginData['dni'],'password'=>$loginData['password']]);
                $loginWay = $this->_em->getReference(LoginWay::class,1);
                $login->setLoginWay($loginWay);
                $login->setUsuario($success);
//                dd($login);
            }elseif (isset($loginData['email'])) {
                $success = $this->findOneBy(['email' => $loginData['email'], 'password' => $loginData['password']]);
                $loginWay = $this->_em->getReference(LoginWay::class,2);
                $login->setLoginWay($loginWay);
                $login->setUsuario($success);
            }
            if(($success)) {
                $success->setLogin($success->getLogin()+1);
                $this->_em->persist($login);
                $this->_em->persist($success);
                $this->_em->flush();
                return ['success' => 'se ha logeado correctamente'];
            }else {
                throw new \Exception('No se ha podido loguear chequee los datos ingresados y la contraseña');
            }
        }catch (\Exception $exception) {
            return ['error'=>$exception->getMessage(),'code' => $exception->getCode()];
        }
    }

    private function save($toSave)
    {
        try {
            $this->_em->persist($toSave);
            $this->_em->flush();
            $this->_em->commit();
        }catch(\Exception $exception) {
            dd($exception);
        }
    }    // /**
    //  * @return Usuario[] Returns an array of Usuario objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Usuario
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
