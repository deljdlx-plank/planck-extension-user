<?php

namespace Planck\Extension;


use Planck\Application\Application;
use Planck\Application\Extension;

class User extends Extension
{


    public function __construct(Application $application)
    {
        parent::__construct($application, 'Planck\Extension\User', __DIR__.'/../..');


        //$entityEditorExtension =


    }


}
