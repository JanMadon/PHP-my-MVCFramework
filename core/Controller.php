<?php

namespace app\core;

use JetBrains\PhpStorm\NoReturn;

class Controller
{
    public function render($view, $param = [])
    {
        return Aplication::$app->router->renderView($view, $param);
    }

    public function request(){
        return Aplication::$app->request->getBody();
    }

}