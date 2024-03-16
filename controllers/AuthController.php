<?php

namespace app\controllers;

use app\core\Aplication;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
//                Aplication::$app-
                return ;
            }
        }

        $this->setLayout('auth');

        return $this->render('login', [
            'model' => $loginForm
        ]);
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