<?php

namespace controllers;

use components\App;

class IndexController
{
    public function actionIndex(): string
    {
        return App::instance()
            ->getView()
            ->render('index/index', [
                'userName' => 'Dmytro Test',
                'age' => 32,
                'gender' => 'male',
                'file' => 'test',
                'variables' => 123123
            ]);
    }
}
