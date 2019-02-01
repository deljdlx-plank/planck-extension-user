<?php

namespace Planck\Extension\User\Model\Repository;



class User extends \Planck\Model\Repository
{

    protected static $tableName = 'user';




    public function emailExists($email)
    {
        try {
            $this->getOneBy('email', $email);
            return true;
        }
        catch(\Exception $exception) {
            return false;
        }
    }


}
