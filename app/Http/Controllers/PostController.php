<?php
namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'topics' => fn () => TopicResource::collection(Topic::all()),
            'posts'  => fn () => PostResource::collection(Post::with('author')->latest()->paginate(static::LIMIT)),
        ]);
    }

    public function create()
    {
        return Inertia::render('Posts/Create', [
            'topics' => fn () => TopicResource::collection(Topic::all()),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => ['required'],
        ]);

        $request->user()->posts()->create([
            'title'    => $request->title,
            'slug'     => $request->title,
            'content'  => $request->content,
        ]);

        return back()->with('success', 'post created successfully');
    }

    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', [
            'post'               => fn () => PostResource::make($post->load('author')),
            'authorRelatedPosts' => PostResource::collection(
                $post->author->posts()->where('id', '!=', $post->id)->take(3)->get()
            )
        ]);
    }
}
