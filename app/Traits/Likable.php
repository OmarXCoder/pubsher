<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Auth;

trait Likable
{
    public function likes(): MorphToMany
    {
        return $this->morphToMany(User::class, 'likable');
    }

    public function like(User $user = null)
    {
        $this->likes()->attach($user ?: Auth::user());
    }

    public function removeLike(User $user = null)
    {
        $this->likes()->detach($user ?: Auth::user());
    }

    public function isLikedBy(User $user = null): bool
    {
        return $this->likes()->where('user_id', $user ? $user->id : Auth::id())->exists();
    }
}
