<?php


namespace AppBundle\Manager;


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
}