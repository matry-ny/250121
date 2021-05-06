<?php

use models\entities\CommentEntity;

/**
 * @var CommentEntity[] $comments
 */

?>
<form action="/messages/create" method="post">
    <div class="mb-3">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" required class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Send Comment</button>
</form>

<table>
    <?php foreach ($comments as $comment) : ?>
        <tr>
            <td>
                <p>
                    User #<?= $comment->user_id, '<br>' ?>
                    <?= $comment->created_at ?>
                </p>
                <p>
                    <a href="/messages/update?id=<?= $comment->id ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="/messages/delete?id=<?= $comment->id ?>" class="btn btn-sm btn-danger">Delete</a>
                </p>
            </td>
            <td valign="top">
                <?= nl2br($comment->comment) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

