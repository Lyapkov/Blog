<?php


namespace AppBundle\Repository;


use AppBundle\Entity\Article;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class ArticleRepository extends EntityRepository
{
    public function findById(int $id)
    {
        return $this->find($id);
    }

    public function addArticle(Article $article)
    {
        $em = $this->getEntityManager();
        $em->persist($article);
        $em->flush();
        return $this->find($article->getId());
    }

    public function getArticles($page, $limit)
    {

        //куча мусора
//        $qb = $this->_em->createQueryBuilder()->from(Article::class, 'article');
//        $qb->select('article');
//        $qb->from('articles', 'a');
//        print_r($qb);
//
//        $qb->add('select', 'a')
//            ->add('from', 'Article a')
//            ->add('where', 'a.id = ?1')
//            ->add('orderBy', 'a.name ASC');
//
//        $query = $qb->getQuery();
//
//        $result = $query->getResult();
//
//
//
//        var_dump($result);
//
//
//        $rs = new ResultSetMapping;
//        $rs->getEntityResultCount();
//
//        $sql = $this->_em->createQueryBuilder(
//            'SELECT COUNT(*) FROM articles', $rs);
//        $rowCount = $sql->getResult();
//        var_dump($rowCount);
//        $lastRow = $page * $limit;
//
//        $offSet = $lastRow - $limit + 1;
//        $first = 1;
//        $last = ceil($lastRow / $limit);
//
//        $rsm = new ResultSetMapping;
//        $rsm->addEntityResult('Article', 'a');
//        $rsm->addEntityResult('a', 'id', 'id');
//        $rsm->addEntityResult('a', 'user_id', 'user_id');
//        $rsm->addEntityResult('a', 'text', 'text');
//        $rsm->addEntityResult('a', 'created_at', 'created_at');
//        $rsm->addEntityResult('a', 'updated_at', 'updated_at');
//        $rsm->addEntityResult('a', 'is_deleted', 'is_deleted');
//        $rsm->addEntityResult('a', 'is_active', 'is_active');
//
//        $query = $this->_em->createNativeQuery(
//            'SELECT a.id, a.user_id, a.name, a.text, a.created_at, a.updated_at, a.is_deleted, a.is_active
//                FROM articles AS a ORDER BY a.id ASC
//                LIMIT' .$offSet. ', ' .$lastRow , $rsm);
//        $query->setParameter();
//
//        $articles = $query->getResult();
    }
}