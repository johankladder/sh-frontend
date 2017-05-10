<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Models\RegisterUser;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function indexAction(Request $request)
    {
      $registerUser = new RegisterUser();

      $form = $this->createFormBuilder($registerUser)
        ->add('email', TextType::class)
        ->add('username', TextType::class)
        ->add('password', TextType::class)
        ->add('save', SubmitType::class, array('label' => 'Register'))
        ->getForm();

        return $this->render('register/index.html.php', [
          'form' => $form->createView()
        ]);
    }
}
