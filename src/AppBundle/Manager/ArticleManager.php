<?php


namespace AppBundle\Manager;

use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class ArticleManager
 * @package AppBundle\Manager
 */
class ArticleManager
{
    public $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getArticle(int $id)
    {

        return $this->doctrine->getRepository(\AppBundle\Entity\Article::class)->findById($id);
    }

}