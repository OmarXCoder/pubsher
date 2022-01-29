<?php
namespace App\Models;

use App\Traits\Likable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, Likable;

    const STATUS_DRAFT     = 'draft';
    const STATUS_PUBLISHED = 'published';

    protected $guarded = [];

    protected $withCount = [
        'likes',
        'comments',
    ];

    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = $this->incrementSlug($slug);
        }

        $this->attributes['slug'] = $slug;
    }

    protected function incrementSlug($slug)
    {
        $max = static::whereTitle($this->title)->latest('id')->value('slug');

        if (is_numeric($max[-1])) {
            return preg_replace_callback('/(\d+)$/', fn ($matches) => $matches[1] + 1, $max);
        }

        return "{$slug}-2";
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topic::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
