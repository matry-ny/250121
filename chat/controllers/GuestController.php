<?php

namespace controllers;

use components\web\AbstractWebController;
use helpers\RequestsHelper;
use models\entities\CommentEntity;
use models\entities\UserContactEntity;
use models\entities\UserEntity;

class GuestController extends AbstractWebController
{
    public function actionLogin()
    {
        return $this->render('guest/login', [], 'guest');
    }

    public function actionRegister()
    {
        if (RequestsHelper::isPost()) {
            $user = new UserEntity();
            $user->name = $_POST['name'];
            $user->login = $_POST['login'];
            $user->password = password_hash($_POST['password'],  PASSWORD_BCRYPT);

            var_dump($user);exit;

//            $user->save();

            $user = UserEntity::find(1);
            $contact = UserContactEntity::find(16);
            $comment = CommentEntity::find(2);
            var_dump($user, $contact, $comment);
            exit;
        }

        return $this->render('guest/register', [], 'guest');
    }
}
