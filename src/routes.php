<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
//$app->get('/test', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("radi brate@@@");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml');
//});
//
//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'indexTest.phtml', $args);
//});

$app->get('/', 'FormController:index');


