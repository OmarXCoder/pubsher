<?php
namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return Inertia::render('User/Profile', [
            'user'     => UserResource::make($user),
            'posts'    => [],
            'comments' => [],
        ]);
    }
}
