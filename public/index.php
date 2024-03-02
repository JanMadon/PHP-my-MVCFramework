<?php

//echo __DIR__.'/vendor/autoload.php';
//exit;
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Aplication;

$app = new Aplication();

//$router = new Router();
$app->router->get('/', function(){
    return 'hello world /';
});
$app->router->get('/users', function(){
    return 'hello world users';
});
$app->router->get('/books', function(){
    return 'hello world books';
});

$app->run();

