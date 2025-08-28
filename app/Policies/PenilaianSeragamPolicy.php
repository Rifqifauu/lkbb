<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PenilaianSeragam;
use App\Models\User;

class PenilaianSeragamPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PenilaianSeragam');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenilaianSeragam $penilaianseragam): bool
    {
        return $user->checkPermissionTo('view PenilaianSeragam');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PenilaianSeragam');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenilaianSeragam $penilaianseragam): bool
    {
        return $user->checkPermissionTo('update PenilaianSeragam');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenilaianSeragam $penilaianseragam): bool
    {
        return $user->checkPermissionTo('delete PenilaianSeragam');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any PenilaianSeragam');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenilaianSeragam $penilaianseragam): bool
    {
        return $user->checkPermissionTo('restore PenilaianSeragam');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any PenilaianSeragam');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, PenilaianSeragam $penilaianseragam): bool
    {
        return $user->checkPermissionTo('replicate PenilaianSeragam');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder PenilaianSeragam');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenilaianSeragam $penilaianseragam): bool
    {
        return $user->checkPermissionTo('force-delete PenilaianSeragam');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any PenilaianSeragam');
    }
}
