<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class PostLikesController extends Controller
{
    public function store(Post $post)
    {
        if (!$post->isLikedBy()) {
            $post->like();
        }

        return Redirect::back();
    }

    public function destroy(Post $post)
    {
        if ($post->isLikedBy()) {
            $post->removeLike();
        }

        return Redirect::back();
    }
}
