<?php

use janm\phpmvc\Aplication;
use app\controllers\AuthController;
use app\controllers\SiteController;

require_once __DIR__ . '/../Utils/debug.php';
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'user' => \app\models\User::class,
    'db' => [
        'dns' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

$app = new Aplication(dirname(__DIR__), $config);

$app->on(Aplication::EVENT_BEFORE_REQUEST, function (){
    echo 'before reguest';
});

$app->router->get('/test', function () {
    return 'hello world users';
});
$app->router->get('/test2', function () {
    return 'hello world books';
});

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/home', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/profile', [AuthController::class, 'profile']);



$app->run();

