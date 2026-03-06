<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            ['name' => '24 Hour Receptionist', 'description' => 'Always available to assist you', 'type' => 'indoor'],
            ['name' => 'Restaurant',           'description' => 'International cuisine on-site',  'type' => 'indoor'],
            ['name' => 'Gym',                  'description' => 'State-of-the-art equipment',     'type' => 'indoor'],
            ['name' => 'Function Room',        'description' => 'Perfect for events & gatherings','type' => 'indoor'],
            ['name' => 'Tennis Court',         'description' => 'Professional standard court',    'type' => 'outdoor'],
            ['name' => 'Swimming Pool',        'description' => 'Resort-style relaxation',        'type' => 'outdoor'],
            ["name" => "Kid's Playground",     'description' => 'Safe & fun for children',        'type' => 'outdoor'],
            ['name' => 'Jogging Track',        'description' => 'Scenic path through gardens',    'type' => 'outdoor'],
            ['name' => 'EV Charger',           'description' => 'Electric vehicle charging',      'type' => 'outdoor'],
        ];

        foreach ($facilities as $facility) {
            Facility::firstOrCreate(
                ['name' => $facility['name']],
                array_merge($facility, ['show_on_page' => true])
            );
        }
    }
}
