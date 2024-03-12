<?php

namespace app\controllers;

use app\core\Aplication;
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
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if($user->validate() && $user->save()) {
                Aplication::$app->session->setFlash('success', 'Thanks for registration');
                Aplication::$app->response->redirect('/');
                // to jeśli przejdzie validacje // przekirowanie
            }
            return $this->render('register', [
                'model' =>$user
            ]);



        }

        $this->setLayout('auth');
        return $this->render('register', ['model' => $user]);
    }

}