<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Peserta;
use App\Models\User;

class PesertaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Peserta');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Peserta $peserta): bool
    {
        return $user->checkPermissionTo('view Peserta');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Peserta');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Peserta $peserta): bool
    {
        return $user->checkPermissionTo('update Peserta');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Peserta $peserta): bool
    {
        return $user->checkPermissionTo('delete Peserta');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Peserta');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Peserta $peserta): bool
    {
        return $user->checkPermissionTo('restore Peserta');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Peserta');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Peserta $peserta): bool
    {
        return $user->checkPermissionTo('replicate Peserta');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Peserta');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Peserta $peserta): bool
    {
        return $user->checkPermissionTo('force-delete Peserta');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Peserta');
    }
}
