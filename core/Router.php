<?php

namespace app\core;

class Router
{

    protected array $routes = [];
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {

        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if(!$callback) {
            return 'not found code: 404';
        }

        if(is_string($callback)){

            $this->renderView($callback);
            exit;
        }

        call_user_func($callback);

        return $callback();


    }

    private function renderView(string $callback)
    {
        $layoutContent = $this->layoutContent();
        $pageContent = $this->pageContent($callback);
        //$view = include_once Aplication::$ROOT_DIR."/views/$callback.php";
        $view = str_replace('{{content}}',$pageContent,$layoutContent);
        echo $view;

        exit;
    }

    private function layoutContent(): string
    {
        ob_start();
        include_once Aplication::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    private function pageContent($pegeName)
    {
        ob_start();
        include_once Aplication::$ROOT_DIR."/views/$pegeName.php";
        return ob_get_clean();
    }


}