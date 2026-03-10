<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'content',
        'category_id', 'user_id', 'status', 'published_at', 'featured_image_url'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        // hero — displayed full-width at top of article (≈900px)
        $this->addMediaConversion('hero')
            ->width(900)
            ->format('webp')
            ->quality(80)
            ->performOnCollections('featured_image')
            ->nonQueued();

        // card — used in article listing cards (≈480px)
        $this->addMediaConversion('card')
            ->width(480)
            ->format('webp')
            ->quality(75)
            ->performOnCollections('featured_image')
            ->nonQueued();
    }
}
