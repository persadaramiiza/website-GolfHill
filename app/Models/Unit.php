<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Unit extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name', 'slug', 'description', 'unit_type_id',
        'price', 'size', 'size_min', 'size_max', 'key_features',
        'bedrooms', 'bathrooms',
        'location', 'image_url', 'status', 'show_on_page', 'contact_person_id'
    ];

    protected $casts = [
        'price'    => 'decimal:2',
        'size'     => 'decimal:2',
        'size_min' => 'decimal:2',
        'size_max' => 'decimal:2',
        'show_on_page' => 'boolean',
    ];

    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }

    public function contactPerson()
    {
        return $this->belongsTo(ContactPerson::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')
            ->useDisk('r2');
        $this->addMediaCollection('floor_plan')
            ->singleFile()
            ->useDisk('r2');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        // Queued WebP thumbnail — runs via the database queue worker,
        // so it never blocks the HTTP save response.
        $this->addMediaConversion('thumb')
            ->width(900)
            ->format('webp')
            ->quality(75)
            ->performOnCollections('gallery')
            ->queued();
    }
}
