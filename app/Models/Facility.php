<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Facility extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'type',
        'show_on_page',
    ];

    protected $casts = [
        'show_on_page' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->useDisk('r2')
            ->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        // card — displayed as facility card background (≈500px wide)
        $this->addMediaConversion('card')
            ->width(600)
            ->format('webp')
            ->quality(75)
            ->performOnCollections('photo')
            ->nonQueued();
    }
}
