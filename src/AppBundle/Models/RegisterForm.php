<?php

/**
 * Created by Johan Kladder & Sebe Jan Vogel.
 *
 * This file was created for the SH-frontend application.
 * Date: 23-5-17
 * Time: 21:53
 */

namespace AppBundle\Models;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Form model for obtaining user registration information. This form
 *
 * Class RegisterForm
 * @package AppBundle\Models
 */
class RegisterForm
{
    /**
     * The user's email address
     * @var
     */
    protected $email;

    /**
     * The user's username
     * @var
     */
    protected $username;

    /**
     * The user's password
     * @var
     */
    protected $password;

    /**
     * The confirmation of the user's password
     * @var
     */
    protected $passwordConfirmation;

    /**
     * @param ClassMetadata $metadata
     * @throws \Symfony\Component\Validator\Exception\ConstraintDefinitionException
     * @throws \Symfony\Component\Validator\Exception\InvalidOptionsException
     * @throws \Symfony\Component\Validator\Exception\MissingOptionsException
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addGetterConstraint('passwordLegal', new Assert\IsTrue(array(
            'message' => 'Password confirmation was not the same as given password!',
        )));
    }

    /**
     * Function for getting the value of an attribute in this object.
     *
     * @param $attribute string The attribute name
     * @return mixed The attribute's value
     */
    public function __get($attribute)
    {
        return $this->$attribute;
    }

    /**
     * Function for setting an attribute in this model with an given value.
     *
     * @param $attribute string The attribute's name liked to be edited
     * @param $value mixed The value of the mentioned attribute
     */
    public function __set($attribute, $value)
    {
        $this->$attribute = $value;
    }

    /**
     * Function for checking if an attribute is set in this object.
     *
     * @param $attribute string The attribute's name
     * @return bool Status if the attribute is set or not
     */
    public function __isset($attribute)
    {
        return !isset($this->$attribute);
    }

    /**
     * Validation method for determine if the passwordConfirmation string value matches
     * exactly the password attribute of this class.
     *
     * @return bool
     */
    public function isPasswordLegal()
    {
        return !strcmp($this->password, $this->passwordConfirmation);

    }

}
