<?php

//echo 'test';
//ob_start();
//
//$var = ob_get_clean();
//echo 'test po ob_clean';
//echo '<br>';
//echo $var;
//
//exit;

//echo __DIR__.'/vendor/autoload.php';
//exit;
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Aplication;

$app = new Aplication(dirname(__DIR__));

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
$app->router->get('/home', 'home');
$app->router->get('/contact', 'contact');

$app->run();

