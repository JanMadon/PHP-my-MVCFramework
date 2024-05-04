<?php

namespace app\controllers;

use app\core\Aplication;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;

class SiteController extends Controller
{

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();

        if ($request->isPost()) {

            $contact->loadData($request->getBody());

            if ($contact->validate() && $contact->send()) {
                Aplication::$app->session->setFlash('success', 'Thanks for contacting us.');
                $response->redirect('/contact');
            }

        }

        return $this->render('contact', [
            'model' => $contact
        ]);
    }
    public function home()
    {
        $param = [
            'name' => 'jan'
        ];

        return $this->render('home', $param);
    }
}