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
require_once  __DIR__ . '/../Utils/debug.php';
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\SiteController;
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
$app->router->get('/home', [SiteController::class, 'home']);
//$app->router->get('/contact', [SiteController::class, 'contact']);
//$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);



$app->run();

