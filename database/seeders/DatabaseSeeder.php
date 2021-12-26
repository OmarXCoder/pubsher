<?php
namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $author = User::factory()->create(['name' => 'Omar Ali', 'email' => 'omarxcoder@gmail.com']);

        $topics = Topic::factory(20)->create();

        $topics->each(fn ($topic) => Post::factory(random_int(2, 6))->create([
            'author_id' => $author->id,
            'topic_id'  => $topic->id
        ]));

        $posts = Post::all();

        $tags = Tag::factory(30)->create();

        $tag_ids = $tags->pluck('id')->toArray();

        $posts->each(fn ($post) => $post->tags()->attach(Arr::random($tag_ids, 3)));

        $posts->each(fn ($post) => Comment::factory(3)->create(['commentable_id' => $post->id]));
    }
}
