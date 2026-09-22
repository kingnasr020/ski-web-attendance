<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'indonesiaski922@gmail.com'],
            [
                'name' => 'Administrator Pusat', 
                'password' => Hash::make('rahasia2026'),
                'email_verified_at' => now(),
            ]
        );
    }
}