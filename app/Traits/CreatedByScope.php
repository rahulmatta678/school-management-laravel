<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

/**
 * Automatically scopes queries to the creator's ID and sets creator during creation.
 *
 * For Teachers: scopes to their own students/parents/announcements.
 * For Models: auto-sets user_id or teacher_id on boot.
 */
trait CreatedByScope
{
    /**
     * Boot the trait to add the global scope and creating listener.
     */
    protected static function bootCreatedByScope(): void
    {
        static::addGlobalScope('creator', function (Builder $builder) {
            // Only apply scoping for non-admins if they are authenticated
            if (Auth::check() && ! Auth::user()->isAdmin()) {
                $instance = new static;
                $column = property_exists($instance, 'creatorColumn') ? $instance->creatorColumn : 'user_id';
                $builder->where($instance->getTable().'.'.$column, Auth::id());
            }
        });

        static::creating(function ($model) {
            $column = property_exists($model, 'creatorColumn') ? $model->creatorColumn : 'user_id';
            
            if (Auth::check() && ! $model->{$column}) {
                $model->{$column} = Auth::id();
            }
        });
    }
}
