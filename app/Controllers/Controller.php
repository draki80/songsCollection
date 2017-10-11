<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/11/2017
 * Time: 11:56 AM
 */

namespace App\Controllers;


class Controller
{
    protected $container;

    public function __construct($container)
    {
        $this->view = $container->renderer;
    }
}