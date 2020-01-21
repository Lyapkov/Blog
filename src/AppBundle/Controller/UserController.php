<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * User controller
 *
 * @Route("blog_user")
 */
class UserController extends Controller
{
    /**
     * @Route("/{id}", name="blog_user_show")
     */
    public function showAction(int $id)
    {
        $userRepository = $this->get('app.user_manager')->GetUser();
        return new Response();
    }
}