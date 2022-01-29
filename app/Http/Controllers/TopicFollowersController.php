<?php
namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Support\Facades\Redirect;

class TopicFollowersController extends Controller
{
    public function store(Topic $topic)
    {
        $topic->addFollower();

        return back()->with('success', 'Followed topic');
    }

    public function destroy(Topic $topic)
    {
        $topic->removeFollower();

        return Redirect::back()->with('success', 'Unollowed topic');
    }
}
