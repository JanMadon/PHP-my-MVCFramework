<?php

namespace app\controllers;

use janm\phpmvc\Aplication;
use janm\phpmvc\Controller;
use janm\phpmvc\middlewares\AuthMiddleware;
use janm\phpmvc\Request;
use janm\phpmvc\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
            }
        }

        $this->setLayout('auth');

        return $this->render('login', [
            'model' => $loginForm
        ]);
    }


    public function register(Request $request): null
    {
        // dd($request->getBody());
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                Aplication::$app->session->setFlash('success', 'Thanks for registration');
                Aplication::$app->response->redirect('/');
                // to jeśli przejdzie validacje // przekirowanie
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }

        $this->setLayout('auth');
        return $this->render('register', ['model' => $user]);
    }

    public function logout(Request $request, Response $response): void
    {
        Aplication::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        Aplication::$app->view->title;
        return $this->render('profile');
    }

}