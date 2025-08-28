<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PenilaianTataRias;
use App\Models\User;

class PenilaianTataRiasPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PenilaianTataRias');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenilaianTataRias $penilaiantatarias): bool
    {
        return $user->checkPermissionTo('view PenilaianTataRias');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PenilaianTataRias');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenilaianTataRias $penilaiantatarias): bool
    {
        return $user->checkPermissionTo('update PenilaianTataRias');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenilaianTataRias $penilaiantatarias): bool
    {
        return $user->checkPermissionTo('delete PenilaianTataRias');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any PenilaianTataRias');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenilaianTataRias $penilaiantatarias): bool
    {
        return $user->checkPermissionTo('restore PenilaianTataRias');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any PenilaianTataRias');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, PenilaianTataRias $penilaiantatarias): bool
    {
        return $user->checkPermissionTo('replicate PenilaianTataRias');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder PenilaianTataRias');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenilaianTataRias $penilaiantatarias): bool
    {
        return $user->checkPermissionTo('force-delete PenilaianTataRias');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any PenilaianTataRias');
    }
}
