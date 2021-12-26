<?php
namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Inertia\Inertia;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        return Inertia::render('Topics/Show', [
            'topic'  => new TopicResource($topic),
            'topics' => TopicResource::collection(Topic::all()),
            'posts'  => PostResource::collection($topic->posts()->with('author')->paginate())
        ]);
    }
}
