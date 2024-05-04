<?php
//
//print_r($argc); // ilość argumentów przkazanych w bashu
//
//exit;

use app\core\Aplication;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__) ;
$dotenv->load();


$config = [
    'user' => \app\models\User::class,
    'db' => [
        'dns' =>$_ENV['DB_DSN'],
        'user' =>$_ENV['DB_USER'], // mvc_framework
        'password' =>$_ENV['DB_PASSWORD'],
    ],
];

$app = new Aplication(__DIR__, $config);

$app->db->applyMigrations();

