<?php

namespace AppBundle\Models;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class RegisterUser
{

  protected $email;
  protected $username;
  protected $password;

  protected $passwordConfirmation;

  public function getEmail()
  {
      return $this->email;
  }

  public function getUsername()
  {
      return $this->username;
  }

  public function getPassword()
  {
      return $this->password;
  }

  public function getPasswordConfirmation()
  {
      return $this->passwordConfirmation;
  }

  public function setEmail($email)
  {
      $this->email = $email;
  }

  public function setUsername($username)
  {
      $this->username = $username;
  }

  public function setPassword($password)
  {
      $this->password = $password;
  }

  public function setPasswordConfirmation($passwordConfirmation)
  {
      $this->passwordConfirmation = $passwordConfirmation;
  }

  public function isPasswordLegal()
  {

      return !strcmp($this->password, $this->passwordConfirmation);

  }


    /**
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {

        $metadata->addGetterConstraint('passwordLegal', new Assert\IsTrue(array(
            'message' => 'Password confirmation was not the same as given password!',
        )));
    }

}
