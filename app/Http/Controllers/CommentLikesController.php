<?php
namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentLikesController extends Controller
{
    public function store(Comment $comment)
    {
        if (!$comment->isLikedBy()) {
            $comment->like();
        }

        return new CommentResource($comment->refresh());
    }

    public function destroy(Comment $comment)
    {
        if ($comment->isLikedBy()) {
            $comment->removeLike();
        }

        return new CommentResource($comment->refresh());
    }
}
