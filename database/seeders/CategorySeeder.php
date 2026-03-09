<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'description' => 'Articles about lifestyle and daily living'
            ],
            [
                'name' => 'Property Tips',
                'slug' => 'property-tips',
                'description' => 'Tips and guides for property investment'
            ],
            [
                'name' => 'Community',
                'slug' => 'community',
                'description' => 'News and updates from our community'
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
                'description' => 'Interior and architectural design inspiration'
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
