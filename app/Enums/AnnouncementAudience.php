<?php

namespace App\Enums;

/**
 * Defines the target audience options for announcements.
 *
 * Used by both Admin (teachers only) and Teacher
 * (students / parents / both) announcement creation flows.
 */
enum AnnouncementAudience: string
{
    case Teachers          = 'teachers';
    case Students          = 'students';
    case Parents           = 'parents';
    case StudentsAndParents = 'students_and_parents';

    /**
     * Returns a human-readable label for display in forms and views.
     */
    public function label(): string
    {
        return match($this) {
            self::Teachers           => 'Teachers',
            self::Students           => 'Students',
            self::Parents            => 'Parents',
            self::StudentsAndParents => 'Students & Parents',
        };
    }

    /**
     * Returns a Tailwind CSS color class for audience badges.
     */
    public function badgeClass(): string
    {
        return match($this) {
            self::Teachers           => 'bg-indigo-100 text-indigo-700',
            self::Students           => 'bg-sky-100 text-sky-700',
            self::Parents            => 'bg-amber-100 text-amber-700',
            self::StudentsAndParents => 'bg-purple-100 text-purple-700',
        };
    }

    /**
     * Returns only the audiences available to teachers
     * (excludes the admin-only "teachers" audience).
     *
     * @return array<self>
     */
    public static function forTeachers(): array
    {
        return [
            self::Students,
            self::Parents,
            self::StudentsAndParents,
        ];
    }
}
