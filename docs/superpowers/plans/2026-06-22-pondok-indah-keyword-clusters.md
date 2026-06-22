# Pondok Indah Keyword Clusters Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Expand GolfHill Terraces' organic search coverage with natural location and rental keyword clusters on the pages that match each search intent.

**Architecture:** Keep location and lifestyle intent on the existing `/pondok-indah-apartment` landing page and rental/configuration intent on `/units`. Render visible FAQs from Blade arrays and encode the same arrays as `FAQPage` JSON-LD so structured data cannot drift from visible content.

**Tech Stack:** Laravel, Blade, PHPUnit feature tests, Schema.org JSON-LD

---

### Task 1: Add Failing Keyword-Cluster Tests

**Files:**
- Modify: `tests/Feature/SeoMetadataTest.php`

- [ ] **Step 1: Add location-cluster assertions**

Add a test that requests `/pondok-indah-apartment` and asserts visible phrases for South Jakarta, Pondok Indah Mall, Jakarta Intercultural School, RS Pondok Indah, family and expat audiences, golf view, links to units/facilities/contact, and `FAQPage` JSON-LD.

- [ ] **Step 2: Add rental-cluster assertions**

Add a test that requests `/units` and asserts `Sewa Apartemen Pondok Indah`, lease wording, 6-month term, 2BR, 3BR, 4BR duplex, links to location/contact, and `FAQPage` JSON-LD.

- [ ] **Step 3: Add exclusion assertions**

Assert that the location and units responses do not contain `kost Pondok Indah`, `low cost rental`, `hiring / jobs`, `Hamptons Park`, or unsupported prices and distance claims.

- [ ] **Step 4: Run the tests and verify RED**

Run: `php artisan test tests/Feature/SeoMetadataTest.php`

Expected: the new assertions fail because keyword sections and FAQ schema do not yet exist.

### Task 2: Expand the Location Landing Page

**Files:**
- Modify: `resources/views/pondok-indah-apartment.blade.php`
- Test: `tests/Feature/SeoMetadataTest.php`

- [ ] **Step 1: Define visible FAQ data**

Create a Blade `$locationFaqs` array containing factual questions and answers about GolfHill Terraces' Pondok Indah location, PIM/JIS/RS Pondok Indah access, family and expat suitability, unit discovery, and lease enquiries.

- [ ] **Step 2: Generate matching FAQ schema**

Map `$locationFaqs` into a `FAQPage` schema object and render it as a second `application/ld+json` script. Use the same question and answer values as the visible FAQ section.

- [ ] **Step 3: Add focused content sections**

Add readable sections for South Jakarta location, nearby destinations, family/expat living, golf-view residential character, and a visible FAQ. Link to `units.index`, `facilities.index`, and `contact`.

- [ ] **Step 4: Run the location test and verify GREEN**

Run: `php artisan test tests/Feature/SeoMetadataTest.php --filter=pondok_indah`

Expected: all location landing-page assertions pass.

### Task 3: Expand Rental and Unit Intent

**Files:**
- Modify: `resources/views/units/index.blade.php`
- Test: `tests/Feature/SeoMetadataTest.php`

- [ ] **Step 1: Define rental FAQ data and schema**

Create a `$rentalFaqs` Blade array for 6-month to 1-year enquiries, 2BR/3BR/4BR duplex options, expat/family suitability, and availability confirmation. Generate matching `FAQPage` JSON-LD.

- [ ] **Step 2: Add rental-intent content**

Update metadata and add visible copy headed `Sewa Apartemen Pondok Indah` with natural English equivalents for lease and South Jakarta rental searches.

- [ ] **Step 3: Add unit configuration content**

Add a compact 2BR, 3BR, and 4BR duplex overview while making availability subject to direct confirmation. Link to `pondok-indah-apartment` and `contact`.

- [ ] **Step 4: Run the rental test and verify GREEN**

Run: `php artisan test tests/Feature/SeoMetadataTest.php --filter=units_page`

Expected: all units-page assertions pass.

### Task 4: Verify Integrated SEO Output

**Files:**
- Modify if needed: `resources/views/home.blade.php`
- Test: `tests/Feature/SeoMetadataTest.php`

- [ ] **Step 1: Verify homepage internal links**

Confirm the homepage links to both the location landing page and units page without adding a keyword list.

- [ ] **Step 2: Run the focused SEO suite**

Run: `php artisan test tests/Feature/SeoMetadataTest.php`

Expected: all SEO metadata tests pass with zero failures.

- [ ] **Step 3: Run the full suite**

Run: `php artisan test`

Expected: all project tests pass with zero failures.

- [ ] **Step 4: Inspect the final diff**

Run: `git diff --check` and `git diff --stat`

Expected: no whitespace errors; only the approved SEO files, tests, design, and plan are changed.
