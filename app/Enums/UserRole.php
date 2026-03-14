<?php

namespace App\Enums;

/**
 * Represents the available roles in the system.
 *
 * Using a PHP 8.2 backed enum ensures type safety and
 * eliminates magic strings throughout the codebase.
 */
enum UserRole: string
{
    case Admin   = 'admin';
    case Teacher = 'teacher';

    /**
     * Returns a human-readable label for display in views.
     */
    public function label(): string
    {
        return match($this) {
            self::Admin   => 'Administrator',
            self::Teacher => 'Teacher',
        };
    }

    /**
     * Returns a Tailwind CSS color class for badges.
     */
    public function badgeClass(): string
    {
        return match($this) {
            self::Admin   => 'bg-indigo-100 text-indigo-800',
            self::Teacher => 'bg-emerald-100 text-emerald-800',
        };
    }
}
