<?php

namespace App\Policies;

use App\Models\Categories_level_two;
use Illuminate\Auth\Access\Response;
use members;

class CategoriesLevelTwoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(members $members): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(members $members, Categories_level_two $categoriesLevelTwo): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(members $members): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(members $members, Categories_level_two $categoriesLevelTwo): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(members $members, Categories_level_two $categoriesLevelTwo): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(members $members, Categories_level_two $categoriesLevelTwo): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(members $members, Categories_level_two $categoriesLevelTwo): bool
    {
        //
    }
}
