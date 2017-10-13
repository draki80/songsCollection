<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/11/2017
 * Time: 11:56 AM
 */

namespace App\Controllers;

use Slim\Views\PhpRenderer;
use Simplon\Mysql\Mysql;
use Slim\Container;
use Monolog\Logger;


class Controller
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @var PhpRenderer
     */
    protected $view;

    /**
     * @var Mysql
     */
    protected $dbConn;

    /**
     * @var Logger
     */
    protected $log;

    /**
     * Controller constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->view = $container->renderer;
        $this->dbConn = $container->dbConn;
        $this->logger = $container->logger;
    }
}