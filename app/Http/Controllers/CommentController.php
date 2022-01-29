<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function destroy(Comment $comment)
    {
        if (Auth::user()->is($comment->user)) {
            $comment->delete();
        }

        return back();
    }
}
