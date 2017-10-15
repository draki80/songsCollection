<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// controllers
$container['FormController'] = function ($container): \App\Controllers\FormController {
    return new App\Controllers\FormController($container);
};

$container['SongsController'] = function ($container): \App\Controllers\SongsController {
    return new App\Controllers\SongsController($container);
};
$container['ApiController'] = function ($container): \App\Controllers\ApiController {
    return new App\Controllers\ApiController($container);
};

// database connection
$container['songsRepository'] = function ($container): \App\Services\Repositories\SongsRepository{

    $pdo = new Simplon\Mysql\PDOConnector(
        $container->get('settings')['dbConnection']['hostname'],
        $container->get('settings')['dbConnection']['username'],
        $container->get('settings')['dbConnection']['password'],
        $container->get('settings')['dbConnection']['database']
    );
    $pdoConn = $pdo->connect('utf8', []);
    $mysql = new Simplon\Mysql\Mysql($pdoConn);

    return new App\Services\Repositories\SongsRepository($mysql);
};

$container['form'] = function (): \App\Services\Form\Form {
    return new \App\Services\Form\Form();
};

