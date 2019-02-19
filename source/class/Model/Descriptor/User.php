<?php

namespace Planck\Extension\User\Model\Descriptor;


use Planck\Model\EntityDescriptor;
use Planck\Model\Repository;

class User extends EntityDescriptor
{


    public function __construct(Repository $repository, array $descriptor = null)
    {
        parent::__construct($repository, $descriptor);
        $this->getFieldByName('login')->isLabel(true);
    }




}
