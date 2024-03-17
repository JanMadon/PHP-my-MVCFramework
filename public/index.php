<?php

use app\core\Aplication;
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

//$app->router->get('/', function(){ // closure wywala błąd
//    return 'hello world /';
//});
$app->router->get('/users', function () {
    return 'hello world users';
});
$app->router->get('/books', function () {
    return 'hello world books';
});

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/home', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/logout', [AuthController::class, 'logout']);



$app->run();

