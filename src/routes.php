<?php

// Routes

//song controller
$app->get('/songs', 'SongsController:get');
$app->get('/songs/remove/{id}', 'SongsController:delete');

//form controller
$app->get('/songs/add', 'FormController:getAddForm');
$app->get('/songs/{id}', 'FormController:getEditForm')->setName('getEditForm');

$app->post('/songs/add', 'FormController:postAddForm');
$app->post('/songs/{id}', 'FormController:put');

//API controller

$app->get('/api/songs/latest', 'ApiController:getLatest');










