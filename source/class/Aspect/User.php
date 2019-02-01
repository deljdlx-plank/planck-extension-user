<?php

namespace Planck\Extension\User\Aspect;


use Planck\Aspect\Application;

class User extends Application
{


    public static function getName()
    {
        return 'user';
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

        $session = $this->application->getRequest()->getSession();
        if($session) {
            $userData = $session->get('user');


            if($userData) {
                $user = new \Planck\Extension\User\Model\Entity\User();
                $values = json_decode($userData, true);
                if($values) {
                    $user->setValues($values);
                    return $user;
                }
            }
        }

        return false;

    }


}

