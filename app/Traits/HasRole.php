<?php

namespace App\Traits;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Builder;

/**
 * Provides role-checking helpers and query scopes for User model.
 *
 * Usage: add `use HasRole;` inside the User model.
 */
trait HasRole
{
    // -------------------------------------------------------------------------
    // Role Helpers
    // -------------------------------------------------------------------------

    /**
     * Determines whether this user is an administrator.
     */
    public function isAdmin(): bool
    {
        return $this->role === UserRole::Admin;
    }

    /**
     * Determines whether this user is a teacher.
     */
    public function isTeacher(): bool
    {
        return $this->role === UserRole::Teacher;
    }

    // -------------------------------------------------------------------------
    // Query Scopes
    // -------------------------------------------------------------------------

    /**
     * Scope: filter users by role.
     *
     * Example: User::role(UserRole::Teacher)->get()
     *
     * @param Builder   $query
     * @param UserRole  $role
     */
    public function scopeRole(Builder $query, UserRole $role): Builder
    {
        return $query->where('role', $role->value);
    }

    /**
     * Scope: retrieve only admin users.
     *
     * @param Builder $query
     */
    public function scopeAdmins(Builder $query): Builder
    {
        return $query->where('role', UserRole::Admin->value);
    }

    /**
     * Scope: retrieve only teacher users.
     *
     * @param Builder $query
     */
    public function scopeTeachers(Builder $query): Builder
    {
        return $query->where('role', UserRole::Teacher->value);
    }
}
