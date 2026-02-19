# GolfHill Company Profile Website

A Laravel-based company profile website featuring property unit catalog and lifestyle articles with an admin dashboard powered by Filament.

## Features

- **Unit Catalog**: Browse and filter available property units (apartments, houses, commercial spaces)
- **Lifestyle Articles**: Content management system for blog posts and lifestyle content
- **Admin Dashboard**: Comprehensive admin panel built with Filament 3.x
- **Media Management**: Image galleries and floor plans using Spatie Media Library
- **Contact Management**: Display contact persons for each unit with phone and WhatsApp links
- **Article Engagement**: Tags, categories, and nested comments with moderation

## Tech Stack

- **Backend**: PHP 8.2+ with Laravel 12.x
- **Database**: MySQL/MariaDB
- **Admin Panel**: Laravel Filament 3.x
- **Frontend**: Blade templates + Livewire (design in progress via Figma)
- **Assets**: Vite for bundling
- **Media**: Spatie Media Library (images only, no video)

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- MySQL/MariaDB
- Node.js & NPM

### Setup Steps

1. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Configure database**
   Edit `.env` and set your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=golfhill_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Run migrations**
   ```bash
   php artisan migrate
   ```

5. **Create admin user**
   ```bash
   php artisan make:filament-user
   ```

6. **Start development server**
   ```bash
   php artisan serve
   npm run dev
   ```

7. **Access the application**
   - Website: http://localhost:8000
   - Admin Panel: http://localhost:8000/admin

## Database Schema

### Core Tables

**units** - Property listings with type, price, size, bedrooms, bathrooms, location, status (linked to UnitType and ContactPerson)

**unit_types** - Types like apartment, house, commercial

**contact_people** - Contact persons with phone, email, WhatsApp for unit inquiries

**articles** - Lifestyle content with title, content, excerpt, category, author, status

**categories** - Article categories for organization

**tags** - Tags for articles (many-to-many relationship)

**comments** - Nested comments on articles with moderation (pending/approved/rejected)

**media** - Spatie Media Library for image storage (galleries, floor plans, featured images)

## Development Workflow

### Creating Filament Resources

Generate a resource for admin panel:
```bash
php artisan make:filament-resource Unit --generate
```

### Project Structure

```
app/
├── Filament/Resources/   # Filament admin resources
├── Models/               # Eloquent models with relationships
├── Http/Controllers/     # Controllers for frontend
database/
├── migrations/           # Database migrations
└── seeders/             # Database seeders
resources/
├── views/               # Blade templates
└── css/                 # Styles
```

## Next Steps

1. **Create Filament Resources** for all models (Unit, Article, Category, ContactPerson, etc.)
2. **Seed sample data** for testing
3. **Build frontend views** based on Figma designs
4. **Implement filtering** for unit catalog
5. **Add comment moderation** workflow in admin
6. **Configure media conversions** for responsive images

## AI Coding Instructions

See [.github/copilot-instructions.md](.github/copilot-instructions.md) for detailed AI coding guidelines specific to this project.
