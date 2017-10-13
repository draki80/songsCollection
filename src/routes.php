<?php

// Routes

//song controller
$app->get('/songs', 'SongsController:get');
$app->get('/songs/remove/{id}', 'SongsController:delete');

//form controller

$app->get('/songs/createAddForm', 'FormController:addForm');
$app->get('/songs/createEditForm/{id}', 'FormController:editForm');

$app->post('/songs/add', 'FormController:add');
$app->post('/songs/{id}', 'FormController:put');










