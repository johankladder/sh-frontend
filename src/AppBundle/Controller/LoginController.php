<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Models\LoginForm;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function indexAction(Request $request)
    {
      $registerUser = new LoginForm();

      $form = $this->createFormBuilder($registerUser)
        ->add('username', TextType::class)
        ->add('password', PasswordType::class)
        ->add('save', SubmitType::class, array('label' => 'Login'))
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $task = $form->getData();
          return $this->redirectToRoute('success');
        }

        return $this->render('login/index.html.php', [
          'form' => $form->createView()
        ]);
    }

}
