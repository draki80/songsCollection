<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/11/2017
 * Time: 11:56 AM
 */

namespace App\Controllers;

use App\Services\Form\Form;
use App\Services\Repositories\SongsRepository;
use Slim\Views\PhpRenderer;
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
     * @var SongsRepository
     */
    protected $songsRepository;

    /**
     * @var Logger
     */
    protected $log;

    /**
     * @var Form
     */
    protected $form;

    /**
     * Controller constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->view = $container->renderer;
        $this->songsRepository = $container->songsRepository;
        $this->logger = $container->logger;
        $this->form = $container->form;
    }
}