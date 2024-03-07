<?php

namespace app\core;

use JetBrains\PhpStorm\NoReturn;

class Controller
{
    public string $layout = 'main';

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $param = [])
    {
        return Aplication::$app->router->renderView($view, $param);
    }

    public function request(Request $request){

        if($request->isPost()){
            return 'handle submitted data';
        }

        return Aplication::$app->request->getBody();
    }

}