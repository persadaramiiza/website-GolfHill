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
        // thumb — used in unit detail hero (≈800px wide)
        $this->addMediaConversion('thumb')
            ->width(800)
            ->height(600)
            ->format('webp')
            ->quality(80)
            ->performOnCollections('gallery')
            ->nonQueued();

        // listing — used in unit index card slider (≈500px wide)
        $this->addMediaConversion('listing')
            ->width(600)
            ->height(450)
            ->format('webp')
            ->quality(75)
            ->performOnCollections('gallery')
            ->nonQueued();

        // preview — used in unit detail thumbnail grid (≈200px wide)
        $this->addMediaConversion('preview')
            ->width(400)
            ->height(300)
            ->format('webp')
            ->quality(75)
            ->performOnCollections('gallery')
            ->nonQueued();
    }
}
