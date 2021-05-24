<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entities\CommentEntity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RuntimeException;

class CommentsController extends Controller
{
    public function all(): Collection
    {
        return CommentEntity::query()->with('author')->get();
    }

    public function create(Request $request): CommentEntity
    {
        $validated = $request->validate([
            'comment' => 'required|min:5'
        ]);

        $comment = new CommentEntity();
        $comment->comment = $validated['comment'];
        $comment->user_id = Auth::user()->getAuthIdentifier();
        $comment->save();

        return $comment;
    }

    public function update(Request $request, int $id): CommentEntity
    {
        $validated = $request->validate([
            'comment' => 'required|min:5'
        ]);

        $comment = $this->findComment($id);
        $comment->comment = $validated['comment'];
        $comment->save();

        return $comment;
    }

    public function delete(int $id): void
    {
        $this->findComment($id)->delete();
    }

    private function findComment(int $id): CommentEntity
    {
        /** @var CommentEntity|null $comment */
        $comment = CommentEntity::query()->where(['id' => $id])->first();
        if (!$comment) {
            throw new RuntimeException("Comment #{$id} is undefined");
        }

        return $comment;
    }
}
