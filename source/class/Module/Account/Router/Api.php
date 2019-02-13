<?php


namespace Planck\Extension\User\Module\Account\Router;


use Planck\Extension\User\Model\Entity\User;
use Planck\Routing\Router;


class Api extends Router
{



    public function registerRoutes()
    {

        $this->post('login', '`/account/api/login`', function() {

            $data = $this->post();


            $user = $this->application->getModel()->getEntity(User::class);

            $email = $data['email'];
            $password = $data['password'];


            $loginValid = $user->checkLogin($email, $password);
            if($loginValid) {
                $this->getApplication()->setUser($user);
                echo json_encode($user);
            }
            else {
                echo json_encode(false);
            }

        })
            ->json()
            ->setBuilder('/account/api/login')
        ;




        $this->get('logout', '`/account/api/logout`', function() {
            $this->getApplication()->setUser(null);
            echo json_encode(true);
        })
            ->json()
            ->setBuilder('/account/api/logout')
        ;





        return parent::registerRoutes();
    }

}