<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Property', 'slug' => 'property'],
            ['name' => 'Investment', 'slug' => 'investment'],
            ['name' => 'Modern Living', 'slug' => 'modern-living'],
            ['name' => 'Family', 'slug' => 'family'],
            ['name' => 'Luxury', 'slug' => 'luxury'],
            ['name' => 'Smart Home', 'slug' => 'smart-home'],
            ['name' => 'Green Living', 'slug' => 'green-living'],
            ['name' => 'Amenities', 'slug' => 'amenities'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
