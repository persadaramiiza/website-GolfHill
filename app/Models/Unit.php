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
        'price', 'size', 'bedrooms', 'bathrooms',
        'location', 'image_url', 'status', 'show_on_page', 'contact_person_id'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'size' => 'decimal:2',
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
        // Conversions disabled — images are already resized client-side
        // to 1920×1080 via Filament's imageResizeTarget before upload.
        // Re-enable with queued() once a queue worker is configured.
    }
}
