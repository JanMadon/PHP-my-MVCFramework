<?php

namespace app\core;

use JetBrains\PhpStorm\NoReturn;

class View
{
    public string $title = 'something';

    #[NoReturn] public function renderView(string $callback, array $params = []): void
    {

        $layoutContent = $this->layoutContent();
        $pageContent = $this->pageContent($callback, $params);
        $view = str_replace('{{content}}', $pageContent, $layoutContent);
        echo $view;
        exit;
    }

//    #[NoReturn] private function renderMessage(string $msc): void
//    {
//        $layoutContent = $this->layoutContent();
//        $view = str_replace('{{content}}', $msc, $layoutContent);
//        echo $view;
//        exit;
//    }

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