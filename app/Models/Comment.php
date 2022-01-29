<?php
namespace App\Models;

use App\Traits\Likable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory, Likable;

    protected $guarded = [];

    protected $withCount = [
        'likes',
    ];

    public function publishedAtDiff(): Attribute
    {
        return Attribute::get(
            fn ($value, $attributes) => $this->created_at->shortRelativeDiffForHumans()
        );
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
