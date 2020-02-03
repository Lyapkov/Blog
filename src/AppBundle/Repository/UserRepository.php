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
}