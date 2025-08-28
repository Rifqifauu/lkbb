<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AspekDanton;
use App\Models\User;

class AspekDantonPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any AspekDanton');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AspekDanton $aspekdanton): bool
    {
        return $user->checkPermissionTo('view AspekDanton');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create AspekDanton');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AspekDanton $aspekdanton): bool
    {
        return $user->checkPermissionTo('update AspekDanton');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AspekDanton $aspekdanton): bool
    {
        return $user->checkPermissionTo('delete AspekDanton');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any AspekDanton');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AspekDanton $aspekdanton): bool
    {
        return $user->checkPermissionTo('restore AspekDanton');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any AspekDanton');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, AspekDanton $aspekdanton): bool
    {
        return $user->checkPermissionTo('replicate AspekDanton');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder AspekDanton');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AspekDanton $aspekdanton): bool
    {
        return $user->checkPermissionTo('force-delete AspekDanton');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any AspekDanton');
    }
}
