<?php
/**
 * Created by Johan Kladder & Sebe Jan Vogel.
 *
 * This file was created for the SH-frontend application.
 * Date: 23-5-17
 * Time: 19:48
 */

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class UserProvider implements UserProviderInterface
{
    /**
     * Function that is called when trying to authenticate an user according to the security controller. This function
     * will try to authenticate the user by an given username. It will obtain user information from external sources and
     * if will load this values (if any) into an User object. From there on the authentication service from Symfony will
     * compare the User that is created from the form with the user that is created in this function.
     *
     * @param string $username The username that is used for authentication
     * @return User             An User object that contains the values of gathered sources that match the given
     *                          username.
     * @throws \Symfony\Component\Security\Core\Exception\UsernameNotFoundException When user cannot be found.
     */
    public function loadUserByUsername($username)
    {
        // make a call to your webservice here
        $userData = true;
        // pretend it returns an array on success, false if there is no use
        // TODO: Api call or userfile when in test environment
        if ($userData) {
            $username = 'admin';
            $password = 'asdasd';
            $salt = null;
            $roles = ['ROLE_USER'];

            return new User($username, $password, $salt, $roles);
        }

        throw new UsernameNotFoundException(
            sprintf('Username "%s" does not exist.', $username)
        );
    }

    /**
     * Function that authenticates an UserInterface that was already found in the runtime of the application. I.e. this
     * user could've been stored in a session. To ensure the user is still correct, this function will still authenticate
     * the given user.
     * @param UserInterface $user An UserInterface object with user values
     * @return User                 An User object that is authenticated correctly
     * @throws \Symfony\Component\Security\Core\Exception\UnsupportedUserException  When given user is not an instance of
     *                                                                              User class.
     * @see UserProvider::loadUserByUsername()
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * Function that checks whether an given class string matches the supported class of the profiler.
     * @param string $class The class of matter
     * @return bool Status if it is the same class
     */
    public function supportsClass($class)
    {
        return User::class === $class;
    }
}