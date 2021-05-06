<?php

namespace components\web;

use components\App;
use helpers\RequestsHelper;
use models\User;

abstract class AbstractSecuredWebController extends AbstractWebController
{
    public function __construct()
    {
        if ($this->getAuthUser()->isGuest()) {
            RequestsHelper::redirect('/guest/login');
        }
    }

    public function getAuthUser(): User
    {
        return App::instance()->getSession()->get(User::USER, new User());
    }
}
