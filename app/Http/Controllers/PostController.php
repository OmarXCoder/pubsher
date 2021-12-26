<?php
namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use App\Models\Post;
use App\Models\Topic;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'topics' => TopicResource::collection(Topic::all()),
            'posts'  => PostResource::collection(Post::with('author')->paginate()),
        ]);
    }
}
