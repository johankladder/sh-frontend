<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Models\RegisterForm;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function indexAction(Request $request)
    {
      $registerForm = new RegisterForm();

      $form = $this->createFormBuilder($registerForm)
        ->add('email', EmailType::class)
        ->add('username', TextType::class)
        ->add('password', PasswordType::class)
        ->add('passwordConfirmation', PasswordType::class)
        ->add('save', SubmitType::class, array('label' => 'Register'))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $task = $form->getData();
          return $this->redirectToRoute('success');
        }

        return $this->render('register/index.html.php', [
          'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/register-success", name="success")
     */
    public function succesAction(Request $request)
    {
        return $this->render('register/success.html.php');
    }
}
