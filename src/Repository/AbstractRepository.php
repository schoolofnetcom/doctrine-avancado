<?php

namespace SON\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\UnitOfWork;

abstract class AbstractRepository extends EntityRepository
{
    public function getReference($id,$class = null){
        if(!$class){
            $class = $this->getClassName();
        }
        return $this->getEntityManager()->getReference($class,$id);
    }

    public function save($entity){
        if($this->getEntityManager()->getUnitOfWork()->getEntityState($entity) == UnitOfWork::STATE_NEW){
            //print_r('não executa aqui');
            $this->getEntityManager()->persist($entity);
        }
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function delete($id){
        $entity = $this->getReference($id);
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }
}