<?php

use models\entities\CommentEntity;

/**
 * @var CommentEntity $comment
 */

?>
<form action="/messages/update?id=<?= $comment->id ?>" method="post">
    <div class="mb-3">
        <label for="comment">Comment</label>
        <textarea name="comment"
                  id="comment"
                  required
                  class="form-control"><?= $comment->comment ?></textarea>
    </div>

    <button type="submit" class="btn btn-success">Update Comment</button>
</form>
