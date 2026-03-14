<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = \App\Models\Student::all();

        foreach ($students as $student) {
            \App\Models\ParentModel::factory()->create([
                'student_id' => $student->id,
            ]);
        }
    }
}
