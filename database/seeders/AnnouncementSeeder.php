<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin announcements (for teachers)
        $admin = \App\Models\User::admins()->first();
        if ($admin) {
            \App\Models\Announcement::factory(5)->create([
                'user_id' => $admin->id,
                'target_audience' => \App\Enums\AnnouncementAudience::Teachers,
            ]);
        }

        // Teacher announcements
        $teachers = \App\Models\User::teachers()->get();
        foreach ($teachers as $teacher) {
            \App\Models\Announcement::factory(2)->create([
                'user_id' => $teacher->id,
                'target_audience' => \App\Enums\AnnouncementAudience::Students, // Mix it up manually or keep it simple
            ]);
        }
    }
}
