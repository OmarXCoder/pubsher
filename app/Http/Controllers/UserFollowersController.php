<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserFollowersController extends Controller
{
    public function store(User $user)
    {
        Auth::user()->follow($user);

        return Redirect::back()->with('success', "Followed {$user->name}");
    }

    public function destroy(User $user)
    {
        Auth::user()->unfollow($user);

        return Redirect::back()->with('success', "Unollowed {$user->name}");
    }
}
