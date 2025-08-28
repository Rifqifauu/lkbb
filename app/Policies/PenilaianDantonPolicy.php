<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PenilaianDanton;
use App\Models\User;

class PenilaianDantonPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PenilaianDanton');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenilaianDanton $penilaiandanton): bool
    {
        return $user->checkPermissionTo('view PenilaianDanton');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PenilaianDanton');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenilaianDanton $penilaiandanton): bool
    {
        return $user->checkPermissionTo('update PenilaianDanton');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenilaianDanton $penilaiandanton): bool
    {
        return $user->checkPermissionTo('delete PenilaianDanton');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any PenilaianDanton');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenilaianDanton $penilaiandanton): bool
    {
        return $user->checkPermissionTo('restore PenilaianDanton');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any PenilaianDanton');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, PenilaianDanton $penilaiandanton): bool
    {
        return $user->checkPermissionTo('replicate PenilaianDanton');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder PenilaianDanton');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenilaianDanton $penilaiandanton): bool
    {
        return $user->checkPermissionTo('force-delete PenilaianDanton');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any PenilaianDanton');
    }
}
