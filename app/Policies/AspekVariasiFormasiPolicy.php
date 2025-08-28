<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AspekVariasiFormasi;
use App\Models\User;

class AspekVariasiFormasiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AspekVariasiFormasi $aspekvariasiformasi): bool
    {
        return $user->checkPermissionTo('view AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AspekVariasiFormasi $aspekvariasiformasi): bool
    {
        return $user->checkPermissionTo('update AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AspekVariasiFormasi $aspekvariasiformasi): bool
    {
        return $user->checkPermissionTo('delete AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AspekVariasiFormasi $aspekvariasiformasi): bool
    {
        return $user->checkPermissionTo('restore AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, AspekVariasiFormasi $aspekvariasiformasi): bool
    {
        return $user->checkPermissionTo('replicate AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AspekVariasiFormasi $aspekvariasiformasi): bool
    {
        return $user->checkPermissionTo('force-delete AspekVariasiFormasi');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any AspekVariasiFormasi');
    }
}
