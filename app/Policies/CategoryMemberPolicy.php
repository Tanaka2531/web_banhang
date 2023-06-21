<?php

namespace App\Policies;

use App\Models\category_member;
use Illuminate\Auth\Access\Response;
use members;

class CategoryMemberPolicy
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
    public function view(members $members, category_member $categoryMember): bool
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
    public function update(members $members, category_member $categoryMember): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(members $members, category_member $categoryMember): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(members $members, category_member $categoryMember): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(members $members, category_member $categoryMember): bool
    {
        //
    }
}
