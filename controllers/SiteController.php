<?php

namespace app\controllers;

use janm\phpmvc\Aplication;
use janm\phpmvc\Controller;
use janm\phpmvc\Request;
use janm\phpmvc\Response;
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