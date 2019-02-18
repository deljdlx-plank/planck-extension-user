<?php

namespace Planck\Extension\User\Model\Descriptor;


use Planck\Model\EntityDescriptor;

class User extends EntityDescriptor
{

    public function getLabelFieldName()
    {
        return 'login';
    }


}
