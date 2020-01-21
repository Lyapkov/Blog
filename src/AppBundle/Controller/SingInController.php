<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SingInController extends Controller
{
    /**
     * @Route("/signIn/", name="singinpage")
     */
    public function signInAction()
    {
        return $this->render('blog/singIn.html.twig');
    }
}