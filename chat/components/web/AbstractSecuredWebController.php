<?php


namespace components\web;


use helpers\RequestsHelper;
use models\User;

abstract class AbstractSecuredWebController extends AbstractWebController
{
    public function __construct()
    {
        $user = new User();
        if ($user->isGuest()) {
            RequestsHelper::redirect('/guest/login');
        }
    }
}
