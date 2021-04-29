<?php

namespace controllers;

use components\web\AbstractSecuredWebController;

class ProfileController extends AbstractSecuredWebController
{
    public function actionView()
    {
        echo '!!!!' . __METHOD__;
    }
}
