<?php


namespace AppBundle\Repository;


use AppBundle\Entity\Article;
use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
    public function findById(int $id)
    {
        return $this->find($id);
    }
}