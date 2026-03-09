<?php

namespace Database\Seeders;

use App\Models\UnitType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnitTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'name' => 'Apartment',
                'slug' => 'apartment',
                'description' => 'Modern apartment units with great amenities'
            ],
            [
                'name' => 'House',
                'slug' => 'house',
                'description' => 'Spacious house units perfect for families'
            ],
            [
                'name' => 'Commercial',
                'slug' => 'commercial',
                'description' => 'Commercial spaces for business purposes'
            ],
            [
                'name' => 'Villa',
                'slug' => 'villa',
                'description' => 'Luxury villa with premium facilities'
            ],
        ];

        foreach ($types as $type) {
            UnitType::firstOrCreate(['slug' => $type['slug']], $type);
        }
    }
}
