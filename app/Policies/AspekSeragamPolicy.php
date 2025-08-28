<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AspekSeragam;
use App\Models\User;

class AspekSeragamPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any AspekSeragam');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AspekSeragam $aspekseragam): bool
    {
        return $user->checkPermissionTo('view AspekSeragam');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create AspekSeragam');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AspekSeragam $aspekseragam): bool
    {
        return $user->checkPermissionTo('update AspekSeragam');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AspekSeragam $aspekseragam): bool
    {
        return $user->checkPermissionTo('delete AspekSeragam');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any AspekSeragam');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AspekSeragam $aspekseragam): bool
    {
        return $user->checkPermissionTo('restore AspekSeragam');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any AspekSeragam');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, AspekSeragam $aspekseragam): bool
    {
        return $user->checkPermissionTo('replicate AspekSeragam');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder AspekSeragam');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AspekSeragam $aspekseragam): bool
    {
        return $user->checkPermissionTo('force-delete AspekSeragam');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any AspekSeragam');
    }
}
