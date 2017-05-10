<?php

namespace AppBundle\Models;

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

}
