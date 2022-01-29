<?php
namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostCommentsController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments()->with('user')->latest()->paginate(static::LIMIT);

        return Redirect::back()->with('xhrRes', CommentResource::collection($comments));
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => ['required']
        ]);

        $comment = $post->comments()->create([
            'body'    => $request->comment,
            'user_id' => Auth::user()->id
        ]);

        return Redirect::back()->with('xhrRes', new CommentResource($comment->load('user')));
    }
}
