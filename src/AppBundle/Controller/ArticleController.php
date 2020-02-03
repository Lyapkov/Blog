<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Blog\Test;
use AppBundle\Manager\ArticleManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Repository\ArticleRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\Validator\Validator\ValidatorInterface;


/**
 * Article controller
 *
 * @Route("blog_article")
 */
class ArticleController extends Controller
{
    /**
     * @Route("/", name="blog_article_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $articleManager = $this->get('app.article_manager');

       //$page = (int)$_GET['page'] ?? null;
       $page = null;
        //$limit = (int)$_GET['limit'] ?? null;
        $limit = null;

        $articles = $articleManager->getArticles($page = 1, $limit = 10);


        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findAll();

        return $this->render('blog/article/index.html.twig', array('articles' => $articles,));
    }

    /**
     * @Route("/new", name="blog_article_new")
     * @Method({"GET", "POST"})
     */
    public function newAction()
    {
        return $this->render('blog/article/newArticle.html.twig');
    }

    /**
     * @Route("/new_article", name="blog_article_new_article")
     * @Method({"POST"})
     */
    public function newArticle(Request $request)
    {
        $articleManager = $this->get('app.article_manager');

        $newArticle = new Article();
        $newArticle->setUserId($_POST['userId']);
        $newArticle->setName($_POST['name']);
        $newArticle->setText($_POST['text']);
        $newArticle->setCreatedAt(new \DateTime());
        $newArticle->setIsActive(true);

        $article = $articleManager->addArticle($newArticle);

        return $this->render('blog/article/Article.html.twig', array('article' => $article));
    }


    /**
     * @Route("/{id}", name="blog_articles_show", requirements={"id"="\d+"})
     * @Method("GET")

     */
    public function showAction(int $id): JsonResponse
    {
        $serializer = $this->get('serializer');
        $article = $this->get('app.article_manager')->getArticle($id);//$this->getDoctrine()->getManager(ArticleManager::class)->getRepository(Article::class);
        return (new JsonResponse(null, JsonResponse::HTTP_OK))
            ->setContent($serializer->serialize($article, 'json', []));
        //return $this->render('blog/article/show.html.twig', array('test' => $article));
        //return new Response($article);
    }

}