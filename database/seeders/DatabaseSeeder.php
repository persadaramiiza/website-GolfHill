<?php


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user (safe to run multiple times)
        User::firstOrCreate(
            ['email' => 'admin@golfhill.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@golfhill.com',
                'password' => bcrypt('password'),
            ]
        );

        // Seed data
        $this->call([
            UnitTypeSeeder::class,
            ContactPersonSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            FacilitySeeder::class,
        ]);
    }
}
