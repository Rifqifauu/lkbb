<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AspekTataRias;
use App\Models\User;

class AspekTataRiasPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any AspekTataRias');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AspekTataRias $aspektatarias): bool
    {
        return $user->checkPermissionTo('view AspekTataRias');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create AspekTataRias');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AspekTataRias $aspektatarias): bool
    {
        return $user->checkPermissionTo('update AspekTataRias');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AspekTataRias $aspektatarias): bool
    {
        return $user->checkPermissionTo('delete AspekTataRias');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any AspekTataRias');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AspekTataRias $aspektatarias): bool
    {
        return $user->checkPermissionTo('restore AspekTataRias');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any AspekTataRias');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, AspekTataRias $aspektatarias): bool
    {
        return $user->checkPermissionTo('replicate AspekTataRias');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder AspekTataRias');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AspekTataRias $aspektatarias): bool
    {
        return $user->checkPermissionTo('force-delete AspekTataRias');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any AspekTataRias');
    }
}
