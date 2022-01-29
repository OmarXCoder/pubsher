<?php
namespace App\Models;

use App\Traits\Followable;
use App\Traits\HasAvatar;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Topic extends Model
{
    use HasFactory, HasAvatar, Followable;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'avatar_url',
    ];

    protected $withCount = [
        'followers'
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function meta(): Attribute
    {
        return new Attribute(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value)
        );
    }
}
