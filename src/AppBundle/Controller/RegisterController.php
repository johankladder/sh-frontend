<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route; // DO NOT REMOVE!
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
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
        $errors = [];

        /** @var Form $form */
        $form = $this->createFormBuilder($registerForm)
            ->add('email', EmailType::class)
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->add('passwordConfirmation', PasswordType::class)
            ->add('save', SubmitType::class, array('label' => 'Register'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $registerForm = $form->getData();
            $status = $registerForm->send();
            if ($status) {
                return $this->redirectToRoute('success');
            }

            $errors[] = new FormError('Duplicated User');
        }

        return $this->render('register/index.html.php', [
            'form' => $form->createView(),
            'errors' => $errors
        ]);
    }

    /**
     * @Route("/register-success", name="success")
     */
    public function succesAction()
    {
        return $this->render('register/success.html.php');
    }
}
