<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait CanFollowOtherUsers
{
    public function following(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'followable');
    }

    public function follow(User $user)
    {
        $this->following()->attach($user);
    }

    public function unfollow(User $user)
    {
        $this->following()->detach($user);
    }

    public function isFollowing(User $user = null): bool
    {
        return $user && $this->following()->where('followable_id', $user->id)->exists();
    }

    public function isMutuallyFollowing(User $user): bool
    {
        return $this->isFollowing($user) && $user->isFollowing($this);
    }
}
