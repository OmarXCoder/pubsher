<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Auth;

trait Followable
{
    public function followers(): MorphToMany
    {
        return $this->morphToMany(User::class, 'followable');
    }

    public function addFollower(User $user = null)
    {
        $this->followers()->attach($user ?: Auth::user());
    }

    public function removeFollower(User $user = null)
    {
        $this->followers()->detach($user ?: Auth::user());
    }

    public function isFollowedBy(User $user = null): bool
    {
        return $this->followers()->where('user_id', $user ? $user->id : Auth::id())->exists();
    }
}
