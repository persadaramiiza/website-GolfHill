<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoMetadataTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_render_canonical_robots_and_descriptions(): void
    {
        $pages = [
            '/units' => 'Explore GolfHill Terraces residences in Pondok Indah',
            '/facilities' => 'Discover GolfHill Terraces facilities',
            '/about' => 'Learn about GolfHill Terraces',
            '/contact' => 'Contact GolfHill Terraces',
        ];

        foreach ($pages as $path => $descriptionStart) {
            $response = $this->get($path);

            $response->assertOk();
            $response->assertSee('<link rel="canonical" href="'.url($path).'">', false);
            $response->assertSee('<meta name="robots" content="index, follow">', false);
            $response->assertSee('<meta name="description" content="'.$descriptionStart, false);
        }
    }

    public function test_units_page_has_substantive_location_specific_content(): void
    {
        $response = $this->get('/units');

        $response->assertOk();
        $response->assertSee('Luxury Apartments for Rent in Pondok Indah');
        $response->assertSee('golf course facing residences');
        $response->assertSee('198 residences');
    }
}
