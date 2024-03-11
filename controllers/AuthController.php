<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;

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
        // dd($request->getBody());
        $registerModel = new User();
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());
            if($registerModel->validate() && $registerModel->register()) {
                return "Success";
                // to jeśli przejdzie validacje // przekirowanie
            }
            return $this->render('register', [
                'model' =>$registerModel
            ]);



        }

        $this->setLayout('auth');
        return $this->render('register', ['model' => $registerModel]);
    }

}