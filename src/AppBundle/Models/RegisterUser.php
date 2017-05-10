<?php

namespace AppBundle\Models;

class RegisterUser
{

  protected $email;
  protected $username;
  protected $password;

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

}
