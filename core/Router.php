<?php

namespace app\core;

use app\core\exception\NotFoundException;
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
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            throw new NotFoundException();
        }

        if (is_string($callback)) {
            $this->renderView($callback);

        }

        if (!is_object($callback)) {

            /** @var Controller $controller */
            $controller = new $callback[0]();
            Aplication::$app->controller = $controller;
            $controller->action = $callback[1];

            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
            $callback[0] = $controller;

        }

        return call_user_func($callback, $this->request, $this->response);
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
        $layout = Aplication::$app->controller->layout ?? 'main';
        ob_start();
        include_once Aplication::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    private function pageContent($pageName, $params): bool|string
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Aplication::$ROOT_DIR . "/views/$pageName.php";
        return ob_get_clean();
    }


}