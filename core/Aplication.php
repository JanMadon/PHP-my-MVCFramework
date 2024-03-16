<?php

namespace app\core;

use app\models\User;

class Aplication
{

    public static Aplication $app;
    public static string $ROOT_DIR;
    public DataBase $db;
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Controller $controller;
    public ?DbModel $user;

    public function __construct(string $rootPatch, array $config)
    {
        $this->userClass = $config['user'];
        self::$ROOT_DIR = $rootPatch;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new DataBase($config['db']);

        $primaryValue = $this->session->get('user');
        if ($primaryValue){
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
        dd('stop constructoe');

    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        dd('login');
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}