<?php


namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller
 *
 * @Route("blog_user")
 */
class UserController extends Controller
{
    /**
     * @Route("/{id}", name="blog_user_show", requirements={"id"="\d+"})
     */
    public function showAction(int $id)
    {
        $userRepository = $this->get('app.user_manager')->GetUser();
        return new Response();
    }


    /**
     * @Route("/reg", methods={"GET"}, name="blog_user_reg")
     */
    public function UserReg()
    {
        return $this->render('blog/register.html.twig');
//        return (new JsonResponse(null, 200))
//            ->setContent($serializer->serialize($registrationUser, 'json', []));
    }

    /**
     * @Route("/register", methods={"POST"}, name="blog_user_register")
     */
    public function registerUser(Request $request)
    {
        $session = new Session();
        if ($session->get('isOn'))
        {
            $session->start();
            $session->set('isOn', true);
        }



//        $serializer = $this->get('serializer');
        $userManager = $this->get('app.user_manager');

//        /** @var User $user */
//        $user = $serializer->deserialize($request->getContent(), 'json', User::class);

        $user = new User();
        $user->setFirstName($_POST['firstName']);
        $user->setLastName($_POST['lastName']);
        $user->setEmail($_POST['email']);
        $user->setPhone($_POST['phone']);
        $user->setPassword($_POST['password']);
        $user->setRoleId($_POST['roleId']);
        $user->setCreatedAt((new \DateTime()));

        $registrationUser = $userManager->registrationUser($user);

        $session->set('firstName', $user->getFirstName());
        $session->set('lastName', $user->getLastName());

        return $this->render('blog/user.html.twig', array('user' => $registrationUser));
//        return (new JsonResponse(null, 200))
//            ->setContent($serializer->serialize($registrationUser, 'json', []));
    }

    /**
     * @Route("/authorization", methods={"POST"}, name="blog_user_authorization")
     */
    public function authorizationUser(Request $request)
    {
        $session = new Session();
        if ($session->get('isOn'))
        {
            $session->start();
            $session->set('isOn', true);
        }
        $userManager = $this->get('app.user_manager');

        $authorizationUser = new User();
        $authorizationUser = $userManager->authorizationUser($_POST['email'], $_POST['password']);

        $session->set('firstName', $authorizationUser->getFirstName());
        $session->set('lastName', $authorizationUser->getLastName());

        return $this->render('blog/user.html.twig', array('user' => $authorizationUser));
//        return (new JsonResponse(null, 200))
//            ->setContent($serializer->serialize($registrationUser, 'json', []));
    }
}