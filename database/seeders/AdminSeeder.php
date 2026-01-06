<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Seeder: Crea un utente amministratore predefinito.
 *
 * - email: admin@example.com
 * - password: Admin123!
 * - ruolo: admin (is_admin = true)
 * - email verificata
 */

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Admin123!'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
