<?php


namespace AppBundle\Manager;


use AppBundle\Repository\CommentRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;

/**
 * Class CommentManager
 * @package AppBundle\Manager
 */
class CommentManager
{
    public $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getComment()
    {
        return $this->doctrine->getRepository(CommentRepository::class);
    }
}