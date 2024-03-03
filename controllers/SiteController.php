<?php

namespace app\controllers;

use app\core\Aplication;
use app\core\Controller;

class SiteController extends Controller
{
    public function handleContact()
    {
        return 'Handling submitted data';
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