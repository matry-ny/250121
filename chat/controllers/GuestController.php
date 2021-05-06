<?php

namespace controllers;

use components\App;
use components\web\AbstractWebController;
use helpers\RequestsHelper;
use models\entities\UserEntity;
use models\User;
use RuntimeException;

class GuestController extends AbstractWebController
{
    public function actionLogin()
    {
        if (RequestsHelper::isPost()) {
            try {
                (new User())->login($_POST['login'], $_POST['password']);
                $this->redirect('/');
            } catch (RuntimeException $exception) {
                App::instance()->getSession()->addFlash('errors', $exception->getMessage());
            }
        }

        return $this->render('guest/login', [], 'guest');
    }

    public function actionRegister()
    {
        if (RequestsHelper::isPost()) {
            $user = new UserEntity();
            $user->name = $_POST['name'];
            $user->login = $_POST['login'];
            $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $user->insert();
            $this->redirect('/guest/login');
        }

        return $this->render('/guest/register', [], 'guest');
    }
}
