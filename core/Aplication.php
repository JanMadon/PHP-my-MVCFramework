<?php

namespace app\core;

class Aplication
{

    public static Aplication $app;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;

    public function __construct(string $rootPatch)
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootPatch;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}