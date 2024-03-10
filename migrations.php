<?php

use app\core\Aplication;


require_once  __DIR__ . '/Utils/debug.php';
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$config = [
    'db' => [
        'dns' =>$_ENV['DB_DSN'],
        'user' =>$_ENV['DB_USER'],
        'password' =>$_ENV['DB_PASSWORD'],
    ],
];

$app = new Aplication(__DIR__, $config);

$app->db->applyMigrations();

