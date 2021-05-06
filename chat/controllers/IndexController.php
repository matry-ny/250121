<?php

namespace controllers;

use components\web\AbstractSecuredWebController;
use models\entities\CommentEntity;

class IndexController extends AbstractSecuredWebController
{
    public function actionIndex(): string
    {
        return $this->render('index/index', [
            'comments' => CommentEntity::findAll()
        ]);
    }
}
