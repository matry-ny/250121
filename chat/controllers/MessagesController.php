<?php

namespace controllers;

use components\web\AbstractSecuredWebController;
use helpers\RequestsHelper;
use models\entities\CommentEntity;

class MessagesController extends AbstractSecuredWebController
{
    public function actionCreate(): void
    {
        $comment = new CommentEntity();
        $comment->comment = $_POST['comment'];
        $comment->user_id = $this->getAuthUser()->getUser()->id;
        $comment->insert();

        $this->redirect('/');
    }

    public function actionUpdate()
    {
        $comment = CommentEntity::find($_GET['id']);
        if (RequestsHelper::isPost()) {
            $comment->comment = $_POST['comment'];
            $comment->update();

            $this->redirect('/');
        }

        return $this->render('messages/update', [
            'comment' => $comment,
        ]);
    }
}
