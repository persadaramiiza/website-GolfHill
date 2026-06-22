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

    public function test_pondok_indah_apartment_landing_page_targets_search_intent(): void
    {
        $response = $this->get('/pondok-indah-apartment');

        $response->assertOk();
        $response->assertSee('Pondok Indah Apartment');
        $response->assertSee('GolfHill Terraces');
        $response->assertSee('Jalan Metro Kencana IV Kav. 7');
        $response->assertSee('<meta name="description" content="Discover GolfHill Terraces, a Pondok Indah apartment', false);
        $response->assertSee('<script type="application/ld+json">', false);
        $response->assertSee('"@context":"https://schema.org"', false);
        $response->assertSee('"@type":"ApartmentComplex"', false);
    }

    public function test_sitemap_includes_pondok_indah_apartment_landing_page(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertSee(url('/pondok-indah-apartment'));
    }

    public function test_homepage_exposes_apartment_complex_schema_and_target_keyword(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Pondok Indah apartment');
        $response->assertSee('<script type="application/ld+json">', false);
        $response->assertSee('"@context":"https://schema.org"', false);
        $response->assertSee('"@type":"ApartmentComplex"', false);
        $response->assertSee('Jalan Metro Kencana IV Kav. 7');
        $response->assertSee(route('pondok-indah-apartment'));
    }

    public function test_pondok_indah_landing_page_exposes_location_and_audience_keyword_clusters(): void
    {
        $response = $this->get('/pondok-indah-apartment');

        $response->assertOk();
        $response->assertSee("Luxury Living Near Pondok Indah's Key Destinations", false);
        $response->assertSee('Pondok Indah Mall');
        $response->assertSee('Jakarta Intercultural School (JIS)');
        $response->assertSee('RS Pondok Indah');
        $response->assertSee('Family and Expat Living');
        $response->assertSee('Golf view residences');
        $response->assertSee(route('units.index'));
        $response->assertSee(route('facilities.index'));
        $response->assertSee(route('contact'));
        $response->assertSee('Frequently Asked Questions');
        $response->assertSee('"@type":"FAQPage"', false);
    }

    public function test_units_page_exposes_rental_and_configuration_keyword_clusters(): void
    {
        $response = $this->get('/units');

        $response->assertOk();
        $response->assertSee('Sewa Apartemen Pondok Indah');
        $response->assertSee('Pondok Indah apartment for lease');
        $response->assertSee('6-month');
        $response->assertSee('2BR Apartments');
        $response->assertSee('3BR Suites');
        $response->assertSee('4BR Duplex Residences');
        $response->assertSee(route('pondok-indah-apartment'));
        $response->assertSee(route('contact'));
        $response->assertSee('Rental Questions');
        $response->assertSee('"@type":"FAQPage"', false);
    }

    public function test_commercial_seo_pages_exclude_irrelevant_and_deferred_keywords(): void
    {
        foreach (['/pondok-indah-apartment', '/units'] as $path) {
            $response = $this->get($path);

            $response->assertOk();
            $response->assertDontSee('kost Pondok Indah', false);
            $response->assertDontSee('low cost rental', false);
            $response->assertDontSee('hiring / jobs', false);
            $response->assertDontSee('Hamptons Park', false);
        }
    }
}
