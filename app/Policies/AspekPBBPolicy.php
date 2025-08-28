<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AspekPBB;
use App\Models\User;

class AspekPBBPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any AspekPBB');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AspekPBB $aspekpbb): bool
    {
        return $user->checkPermissionTo('view AspekPBB');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create AspekPBB');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AspekPBB $aspekpbb): bool
    {
        return $user->checkPermissionTo('update AspekPBB');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AspekPBB $aspekpbb): bool
    {
        return $user->checkPermissionTo('delete AspekPBB');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any AspekPBB');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AspekPBB $aspekpbb): bool
    {
        return $user->checkPermissionTo('restore AspekPBB');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any AspekPBB');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, AspekPBB $aspekpbb): bool
    {
        return $user->checkPermissionTo('replicate AspekPBB');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder AspekPBB');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AspekPBB $aspekpbb): bool
    {
        return $user->checkPermissionTo('force-delete AspekPBB');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any AspekPBB');
    }
}
