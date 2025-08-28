<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PenguranganNilai;
use App\Models\User;

class PenguranganNilaiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PenguranganNilai');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenguranganNilai $pengurangannilai): bool
    {
        return $user->checkPermissionTo('view PenguranganNilai');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PenguranganNilai');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenguranganNilai $pengurangannilai): bool
    {
        return $user->checkPermissionTo('update PenguranganNilai');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenguranganNilai $pengurangannilai): bool
    {
        return $user->checkPermissionTo('delete PenguranganNilai');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any PenguranganNilai');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenguranganNilai $pengurangannilai): bool
    {
        return $user->checkPermissionTo('restore PenguranganNilai');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any PenguranganNilai');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, PenguranganNilai $pengurangannilai): bool
    {
        return $user->checkPermissionTo('replicate PenguranganNilai');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder PenguranganNilai');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenguranganNilai $pengurangannilai): bool
    {
        return $user->checkPermissionTo('force-delete PenguranganNilai');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any PenguranganNilai');
    }
}
