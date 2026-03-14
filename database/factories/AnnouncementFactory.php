<?php

namespace Database\Factories;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'           => $this->faker->sentence(6),
            'body'            => $this->faker->paragraph(3),
            'target_audience' => $this->faker->randomElement(\App\Enums\AnnouncementAudience::cases()),
            'user_id'         => \App\Models\User::factory(),
        ];
    }
}
