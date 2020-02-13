<?php


namespace AppBundle\Repository;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function registrationUser(User $user)
    {
        $em = $this->getEntityManager();
        $em->persist($user);
        $em->flush();
        return $this->find($user->getId());
    }

    public function authorizationUser($email, $password)
    {
        $qb = $this->createQueryBuilder('user');
        $qb->select('user');
        $qb->where('user.email = :email');
        $qb->andWhere('user.password = :password');
        $qb->setParameters(['email' => $email, 'password' => $password]);
        return $qb->getQuery()->getSingleResult();
    }
}