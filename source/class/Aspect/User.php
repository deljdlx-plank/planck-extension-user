<?php

namespace Planck\Extension\User\Aspect;


use Planck\Application\Aspect;

class User extends Aspect
{

    /**
     * @var \Planck\Extension\User\Model\Entity\User
     */
    private $user;

    public static function getName()
    {
        return 'user';
    }


    public function getUser($cast = null)
    {
        return $this->getCurrentUser($cast);
    }

    public function setUser($user)
    {
        return $this->setCurrentUser($user);
    }

    public function setCurrentUser($user)
    {
        $session = $this->application->getRequest()->getSession();
        if($session) {
            return $session->set('user', json_encode($user));
        }

        return $this;
    }


    public function getCurrentUser($cast = null)
    {

        if($this->user) {
            return $this->user;
        }

        $session = $this->application->getRequest()->getSession();
        if($session) {
            $userData = $session->get('user');


            if($userData) {
                $user = new \Planck\Extension\User\Model\Entity\User();
                $values = json_decode($userData, true);
                if($values) {
                    $user->setValues($values);
                    $this->user = $user;
                    return $user;
                }
            }
        }

        return false;

    }


}

