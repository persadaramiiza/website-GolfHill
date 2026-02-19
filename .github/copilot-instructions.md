# GolfHill Company Profile Website - AI Coding Instructions

## Project Overview
Laravel-based company profile website featuring:
- **Unit Catalog**: Browse and filter available property units
- **Lifestyle Articles**: Content management for articles/blog posts
- **Admin Panel**: Dashboard for managing units, articles, and site content

Frontend design is being developed in Figma by the team concurrently.

## Architecture & Tech Stack
- **Backend**: PHP 8.2+ with Laravel 11.x
- **Database**: MySQL/MariaDB
- **Admin Panel**: Laravel Filament 3.x
- **Frontend**: Blade templates + Alpine.js/Livewire (to be integrated with Figma designs)
- **Assets**: Vite for bundling CSS/JS
- **Media**: Spatie Media Library for image galleries (no video support)

## Key Models & Relationships
```php
// Core domain models
Unit (property listings)
  - belongs to UnitType (apartment, house, commercial)
  - has many Media (images, floor plans only - no video)
  - belongs to Status (available, sold, reserved)
  - has one ContactPerson (for inquiries)

Article (lifestyle content)
  - belongs to Category
  - belongs to User (author - with profile)
  - has many Tags (morphMany)
  - has many Comments
  - has many Media (featured images)
  
User (admin access)
  - has role (admin, editor, viewer)
  - has profile (name, bio, avatar for article authorship)

ContactPerson
  - has many Units
  - fields: name, phone, email, whatsapp
```

## Development Workflows

### Initial Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run dev
```

### Database Migrations
- Use descriptive migration names: `create_units_table`, `add_featured_to_articles`
- Always include rollback in `down()` method
- Seed sample data for units and articles in seeders

### Admin Panel Conventions
- **Filament Resources**: Place in `app/Filament/Resources/`
- **Forms**: Use Filament's fluent form builder, group related fields
- **Tables**: Include filters for status, type, date ranges
- **Media uploads**: Use Spatie Media Library pattern

### Frontend Patterns
- **Layouts**: `resources/views/layouts/app.blade.php` for main site
- **Components**: Blade components in `resources/views/components/`
- **Partials**: Unit cards, article cards as reusable partials
- **CSS**: Tailwind utility-first, component classes in `app.css`

## Critical Patterns

### Unit Catalog
```php
// Controller pattern for filtering units
public function index(Request $request) {
    $units = Unit::query()
        ->when($request->type, fn($q) => $q->where('unit_type_id', $request->type))
        ->when($request->status, fn($q) => $q->where('status', $request->status))
        ->when($request->price_min, fn($q) => $q->where('price', '>=', $request->price_min))
        ->with('media', 'unitType')
        ->paginate(12);
    
    return view('units.index', compact('units'));
}
```

### Image Handling
- Use Spatie Media Library for unit galleries and article images (images only, no video)
- Define media collections: 'gallery', 'floor_plan', 'featured_image'
- Generate responsive images with conversions (webp format recommended)

### Contact Flow
```php
// Unit detail page displays contact person info
@if($unit->contactPerson)
    <div class="contact-card">
        <h3>Interested? Contact:</h3>
        <p>{{ $unit->contactPerson->name }}</p>
        <a href="tel:{{ $unit->contactPerson->phone }}">{{ $unit->contactPerson->phone }}</a>
        <a href="https://wa.me/{{ $unit->contactPerson->whatsapp }}">WhatsApp</a>
    </div>
@endif
```

### Article Engagement
- **Tags**: Polymorphic taggable system for articles
- **Comments**: Nested comments with moderation (approve/reject in Filament)
- **Author Profiles**: Display author bio, avatar, article count on article pages

### SEO & Metadata
- Use Laravel MetaTags package or custom implementation
- Each unit and article should have: title, description, og:image
- Generate sitemap for units and articles

## Coding Standards
- **PSR-12** for PHP code style
- **Form Requests** for validation: `StoreUnitRequest`, `UpdateArticleRequest`
- **Services**: Extract complex business logic to service classes in `app/Services/`
- **Route naming**: `units.index`, `admin.articles.create`
- **Authorization**: Use Policies for unit and article CRUD operations

## Integration Points
- **Frontend sync**: Coordinate with Figma designs - use CSS variables for theming
- **Contact display**: Show contact person details on each unit page (phone, WhatsApp)
- **Comment moderation**: Queue notifications for new comments to admin

## Testing Approach
```bash
php artisan test                    # Run feature tests
php artisan test --filter=UnitTest  # Test specific feature
```
- Feature tests for unit filtering, article CRUD
- Test admin authorization for protected routes
- Mock file uploads in tests

## Common Tasks

### Add new unit type
1. Seed in `UnitTypeSeeder`
2. Update unit form in Filament Resource
3. Add filter option in frontend catalog

### Create new article category
1. Migration for categories table
2. Filament Resource for category management
3. Category filter on articles index

### Manage contact persons
1. Filament Resource in `app/Filament/Resources/ContactPersonResource.php`
2. Assign to units via relationship field
3. Display on unit detail page with click-to-call and WhatsApp links

### Moderate comments
1. Filament Resource with status filter (pending, approved, rejected)
2. Bulk actions for approve/reject
3. Email notifications on new comments

### Deploy checklist
- `php artisan optimize`
- `npm run build`
- Set `APP_ENV=production` and `APP_DEBUG=false`
- Configure queue worker for jobs
- Set up Laravel scheduler cron job
