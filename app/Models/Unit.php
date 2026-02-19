<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Unit extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name', 'slug', 'description', 'unit_type_id', 
        'price', 'size', 'bedrooms', 'bathrooms', 
        'location', 'status', 'contact_person_id'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'size' => 'decimal:2',
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
        $this->addMediaCollection('gallery');
        $this->addMediaCollection('floor_plan')
            ->singleFile();
    }
}
