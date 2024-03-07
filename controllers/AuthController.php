<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        var_dump($request->getBody());
        exit();

        $this->setLayout('auth');
        return $this->render('login');
    }


    public function register(Request $request)
    {

        $registerModel = new RegisterModel();
        if ($request->isPost()) {
            //var_dump($request->getBody());
            //exit();
            $registerModel->loadData($request->getBody());
            if($registerModel->validate()) {
                
            }

            echo 'user register';
            exit();
        }

        $this->setLayout('auth');
        return $this->render('register');
    }

}