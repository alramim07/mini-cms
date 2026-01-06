<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Seeder: crea annunci di esempio per testare UI e flussi admin.
 */
class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // assegna al primo utente

        Announcement::factory()->count(5)->create([
            'user_id' => $user->id,
            'is_published' => true,
            'is_approved' => false, // così compaiono nell'area admin
        ]);
    }
}
