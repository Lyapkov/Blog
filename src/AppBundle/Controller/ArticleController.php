<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Blog\Test;
use AppBundle\Manager\ArticleManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('AppBundle:Article')->findAll();

        return $this->render('blog/article/index.html.twig', array('articles' => $articles,));
    }

    /**
     * Creates a new test entity.
     *
     * @Route("/new", name="blog_test_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('AppBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('blog_article_show', array('id' => $article->getId()));
        }

        return $this->render('blog/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/{id}", name="blog_articles_show")
     * @Method("GET")
     */
    public function showAction(int $id)
    {
        $article = $this->get('app.article_manager')->getArticle($id);//$this->getDoctrine()->getManager(ArticleManager::class)->getRepository(Article::class);
        return $this->render('blog/article/show.html.twig', array('test' => $article));
        //return new Response($article);
    }
    /**
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form  The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blog_article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}