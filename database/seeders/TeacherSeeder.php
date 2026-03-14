<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create([
            'role' => \App\Enums\UserRole::Teacher,
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
    }
}
