<?php

namespace app\core;

class Controller
{
    public function render($view, $param = [])
    {
        return Aplication::$app->router->renderView($view, $param);
    }
}