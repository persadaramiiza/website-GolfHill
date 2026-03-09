<?php

namespace Database\Seeders;

use App\Models\ContactPerson;
use Illuminate\Database\Seeder;

class ContactPersonSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'Budi Santoso',
                'phone' => '08123456789',
                'email' => 'budi@golfhill.com',
                'whatsapp' => '628123456789',
            ],
            [
                'name' => 'Siti Rahayu',
                'phone' => '08234567890',
                'email' => 'siti@golfhill.com',
                'whatsapp' => '628234567890',
            ],
            [
                'name' => 'Ahmad Wijaya',
                'phone' => '08345678901',
                'email' => 'ahmad@golfhill.com',
                'whatsapp' => '628345678901',
            ],
        ];

        foreach ($contacts as $contact) {
            ContactPerson::firstOrCreate(['email' => $contact['email']], $contact);
        }
    }
}
