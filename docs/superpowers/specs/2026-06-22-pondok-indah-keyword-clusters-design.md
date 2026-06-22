# Pondok Indah Keyword Cluster SEO Design

## Objective

Expand GolfHill Terraces' organic search coverage for high-intent Pondok Indah apartment searches while keeping page copy useful, factual, and free from keyword stuffing.

## Scope

The implementation will improve existing pages rather than create many thin landing pages:

- `/pondok-indah-apartment` owns location, lifestyle, proximity, golf-view, family, expat, and brand discovery intent.
- `/units` owns rental, lease duration, bedroom configuration, and unit availability intent.
- The homepage reinforces the primary brand and Pondok Indah apartment topic and links to both pages.
- Competitor comparison content is deferred until factual comparison data is available.

## Keyword Mapping

### Pondok Indah Apartment Landing Page

Use these topics naturally in headings, body copy, image text, FAQ content, and metadata where appropriate:

- Pondok Indah apartment / apartemen Pondok Indah
- South Jakarta apartment
- apartments for rent in Pondok Indah
- exclusive living and luxury residential Pondok Indah
- boutique apartment Pondok Indah
- private sanctuary apartment South Jakarta
- family apartment
- apartments near Pondok Indah Mall / apartemen dekat PIM
- apartments near Jakarta Intercultural School / apartemen dekat JIS
- premium apartment near RS Pondok Indah
- luxury housing near Pondok Indah Golf Course
- golf-view apartments and golf-course-facing residences
- expat apartments South Jakarta
- GolfHill Terraces Pondok Indah / Jakarta

Proximity wording must remain qualitative unless verified distance or travel-time data is added later.

### Units Page

Use these transactional topics in the SEO introduction, unit copy, and FAQ:

- sewa apartemen Pondok Indah
- Pondok Indah apartment for lease
- GolfHill Terraces apartment for lease
- luxury apartments South Jakarta for rent
- premium rental apartments Jakarta for expats
- luxury rental Pondok Indah short term
- six-month to one-year lease enquiries
- premium 2BR apartment Pondok Indah
- luxury 3BR suites Pondok Indah
- premium 4BR duplex Pondok Indah

The content may state that 6-month leases and 2BR, 3BR, and 4BR duplex configurations are offered, as confirmed by the stakeholder. Current availability must still be presented as subject to direct confirmation.

### Deferred Comparison Content

The following topics will not be added to commercial page copy during this implementation:

- Hamptons Park Pondok Indah vs GolfHill Terraces
- Pondok Indah Golf Apartment alternatives
- luxury house for rent Pondok Indah

These require a separate, evidence-based comparison or buyer-guide article. Competitor names must not be inserted merely as keyword targets.

### Excluded Keywords

Do not target these terms because they conflict with GolfHill Terraces' premium residential positioning or user intent:

- affordable apartment Pondok Indah
- kost Pondok Indah
- low cost rental South Jakarta
- hiring / jobs at GolfHill Terraces

## Page Changes

### `/pondok-indah-apartment`

- Preserve one primary H1 focused on Pondok Indah apartments and GolfHill Terraces.
- Add concise content sections for location access, family and expat living, golf-facing environment, and nearby destinations.
- Add an FAQ covering location, nearby destinations, target residents, lease enquiries, and unit discovery.
- Add valid `FAQPage` JSON-LD alongside the existing `ApartmentComplex` schema.
- Link clearly to `/units`, facilities, and contact.

### `/units`

- Expand the introductory content around rental and lease intent.
- Add a compact unit-options section describing 2BR, 3BR, and 4BR duplex choices without inventing prices or availability.
- Add lease-term and availability FAQs.
- Add valid `FAQPage` JSON-LD.
- Link back to the Pondok Indah location landing page and contact page.

### Homepage

- Keep the homepage concise.
- Use the primary Pondok Indah apartment phrase naturally.
- Ensure links to the location landing page and units page are discoverable.
- Do not turn the homepage into a complete keyword list.

## Metadata and Structured Data

- Titles should prioritize one primary intent per page and remain readable.
- Meta descriptions should describe the page, not enumerate keywords.
- Preserve canonical URLs.
- Keep the existing `ApartmentComplex` schema valid.
- FAQ structured data must exactly match visible FAQ content.
- No obsolete `meta keywords` tag will be added.

## Testing

Feature tests will verify:

- Important keyword clusters appear on the intended page, not indiscriminately across every page.
- Excluded keywords do not appear in public SEO copy.
- FAQ content and valid `FAQPage` JSON-LD are rendered.
- Existing `ApartmentComplex` schema remains valid.
- Internal links connect homepage, location, units, facilities, and contact pages.
- Existing sitemap and SEO tests continue to pass.

## Success Criteria

- Each target search intent has a clear destination page.
- Copy reads naturally in English and Indonesian search phrasing.
- No unsupported pricing, distance, availability, or competitor claims are introduced.
- All feature tests pass.
