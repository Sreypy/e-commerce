<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    /**
     * View category
     */
    public function view(User $user, Category $category): bool
    {
        // Admin → view all
        if ($user->hasRole('admin')) {
            return true;
        }

        // Manager → view all categories
        if ($user->hasRole('manager')) {
            return true;
        }

        // Staff → view categories (read-only)
        if ($user->hasRole('staff')) {
            return true;
        }

        return false;
    }

    /**
     * Update category
     */
    public function update(User $user, Category $category): bool
    {
        // Only admin & manager can update
        return $user->hasRole('admin') || $user->hasRole('manager');
    }
}
