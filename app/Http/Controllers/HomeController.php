<?php
namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'topics'        => fn () => TopicResource::collection(Topic::all()),
            'posts'         => fn () => PostResource::collection(
                Post::with('author')
                ->latest()
                ->paginate(static::LIMIT)
            ),
            'usersToFollow' => fn () => UserResource::collection(User::take(4)->get())
        ]);
    }
}
