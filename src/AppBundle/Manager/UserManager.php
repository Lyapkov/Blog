<?php


namespace AppBundle\Manager;


use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;

/**
 * Class UserManager
 * @package AppBundle\Manager
 */
class UserManager
{
    public $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function GetUser()
    {
        $this->doctrine->getRepository(UserRepository::class);
    }

    public function registrationUser(User $user)
    {
        return $this->doctrine->getRepository(User::class)->registrationUser($user);
    }
}