<?php

namespace app\core;

use JetBrains\PhpStorm\NoReturn;

class Router
{

    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $this->response->setStatusCode(404);
            $this->renderView('error404');
        }

        if (is_string($callback)) {
            $this->renderView($callback);
            exit;
        }

        if(!is_object($callback[0])){
            $callback[0] = new $callback[0]();
        }
//        var_dump($callback);
//        exit();

        return call_user_func($callback);
        //return $callback();
    }

    #[NoReturn] public function renderView(string $callback, array $params = []): void
    {
        $layoutContent = $this->layoutContent();
        $pageContent = $this->pageContent($callback, $params);
        $view = str_replace('{{content}}', $pageContent, $layoutContent);
        echo $view;
        exit;
    }

    #[NoReturn] private function renderMessage(string $msc): void
    {
        $layoutContent = $this->layoutContent();
        $view = str_replace('{{content}}', $msc, $layoutContent);
        echo $view;
        exit;
    }

    private function layoutContent(): string
    {
        ob_start();
        include_once Aplication::$ROOT_DIR . "/views/layouts/main.php";
        return ob_get_clean();
    }

    private function pageContent($pageName, $params): bool|string
    {
        foreach($params as $key => $value){
            $$key = $value;
        }

        ob_start();
        include_once Aplication::$ROOT_DIR . "/views/$pageName.php";
        return ob_get_clean();
    }


}