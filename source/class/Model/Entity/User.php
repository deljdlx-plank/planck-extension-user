<?php


namespace Planck\Extension\User\Model\Entity;



use Planck\Model\Entity;
use Planck\Model\Traits\HasProperties;


class User extends Entity
{

    use HasProperties;




    public function checkPassword($password)
    {

        $checkPassword = $this->getValue('password');
        if(password_verify($password, $checkPassword)) {
            return true;
        }
        else {
            return false;
        }
    }


    public function checkLogin($email, $password)
    {
        try {
            $entity = $this->repository->getOneBy('email', $email);
        }
        catch (\Exception $e) {
            return false;
        }

        $checkPassword = $entity->getValue('password');


        if(password_verify($password, $checkPassword)) {



            $this->setValues($entity->getValues());
            return true;
        }
        else {
            return false;
        }
    }

    public function doAfterSerialize($data)
    {
        if(array_key_exists('password', $data)) {
            unset($data['password']);
        }
        return $data;
    }



    public function remove()
    {
        $this->setValue('email', '');
        $this->setValue('status', 0);
        $this->setValue('login', '');
        $this->store();
    }


    public function doBeforeInsert()
    {

        $this->setValue(
            'password',
            password_hash($this->getValue('password'), \PASSWORD_DEFAULT)
        );

        return parent::doBeforeInsert();
    }


    public function doBeforeUpdate()
    {

        $this->setValue(
            'password',
            password_hash($this->getValue('password'), \PASSWORD_DEFAULT)
        );

        return parent::doBeforeInsert();
    }

}








