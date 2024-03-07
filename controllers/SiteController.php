<?php

namespace app\controllers;

use app\core\Aplication;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function handleContact(Request $request)
    {
        // posta łapie
        //return 'Handling submitted data';

        $body = $request->getPath();

        var_dump($body);
        exit();

    }
    public function contact()
    {
        return $this->render('contact');
    }
    public function home()
    {
        $param = [
            'name' => 'jan'
        ];

        return $this->render('home', $param);
    }
}