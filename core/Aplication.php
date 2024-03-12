<?php

namespace app\core;

class Aplication
{

    public static Aplication $app;
    public static string $ROOT_DIR;
    public DataBase $db;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Controller $controller;

    public function __construct(string $rootPatch, array $config)
    {
        self::$ROOT_DIR = $rootPatch;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new DataBase($config['db']);
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
}