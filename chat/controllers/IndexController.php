<?php

namespace controllers;

use components\web\AbstractSecuredWebController;

class IndexController extends AbstractSecuredWebController
{
    public function actionIndex(): string
    {
        return $this->render('index/index', [
            'userName' => 'Dmytro Test',
            'age' => 32,
            'gender' => 'male',
            'file' => 'test',
            'variables' => 123123
        ]);
    }
}
