<?php
namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
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
        User::factory()->create(['name' => 'Omar Ali', 'username' => 'OmarAli', 'email' => 'hi@OmarAli.dev']);
        User::factory()->create(['name' => 'John Doe', 'username' => 'JohnDoe', 'email' => 'john@gmail.com']);
        User::factory(10)->create();

        $user_ids = User::all()->pluck('id')->toArray();

        collect($user_ids)->each(fn ($user) => Post::factory(random_int(2, 6))->create(['author_id' => $user]));

        $posts = Post::all();

        $topic_ids = Topic::factory(20)->create()->pluck('id')->toArray();

        $posts->each(fn ($post) => $post->topics()->attach(Arr::random($topic_ids, 2)));

        $posts->each(
            fn ($post) => Comment::factory(3)->sequence(fn () => ['user_id' => Arr::random($user_ids)])->create(['commentable_id' => $post->id])
        );
    }
}
