<?php


namespace AppBundle\Manager;

use AppBundle\Entity\Article;
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

        return $this->doctrine->getRepository(Article::class)->findById($id);
    }

    public function addArticle(Article $article)
    {
        return $this->doctrine->getRepository(Article::class)->addArticle($article);
    }

    public function getArticles($page, $limit)
    {
        return $this->doctrine->getRepository(Article::class)->getArticles($page, $limit);
    }

}