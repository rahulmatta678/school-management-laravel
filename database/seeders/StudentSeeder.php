<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = \App\Models\User::teachers()->get();

        foreach ($teachers as $teacher) {
            \App\Models\Student::factory(10)->create([
                'teacher_id' => $teacher->id,
            ]);
        }
    }
}
