<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PenilaianPBB;
use App\Models\User;

class PenilaianPBBPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PenilaianPBB');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenilaianPBB $penilaianpbb): bool
    {
        return $user->checkPermissionTo('view PenilaianPBB');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PenilaianPBB');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenilaianPBB $penilaianpbb): bool
    {
        return $user->checkPermissionTo('update PenilaianPBB');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenilaianPBB $penilaianpbb): bool
    {
        return $user->checkPermissionTo('delete PenilaianPBB');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any PenilaianPBB');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenilaianPBB $penilaianpbb): bool
    {
        return $user->checkPermissionTo('restore PenilaianPBB');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any PenilaianPBB');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, PenilaianPBB $penilaianpbb): bool
    {
        return $user->checkPermissionTo('replicate PenilaianPBB');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder PenilaianPBB');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenilaianPBB $penilaianpbb): bool
    {
        return $user->checkPermissionTo('force-delete PenilaianPBB');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any PenilaianPBB');
    }
}
