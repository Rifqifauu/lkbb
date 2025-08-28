<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\RekapNilai;
use App\Models\User;

class RekapNilaiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any RekapNilai');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RekapNilai $rekapnilai): bool
    {
        return $user->checkPermissionTo('view RekapNilai');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create RekapNilai');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RekapNilai $rekapnilai): bool
    {
        return $user->checkPermissionTo('update RekapNilai');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RekapNilai $rekapnilai): bool
    {
        return $user->checkPermissionTo('delete RekapNilai');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any RekapNilai');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RekapNilai $rekapnilai): bool
    {
        return $user->checkPermissionTo('restore RekapNilai');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any RekapNilai');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, RekapNilai $rekapnilai): bool
    {
        return $user->checkPermissionTo('replicate RekapNilai');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder RekapNilai');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RekapNilai $rekapnilai): bool
    {
        return $user->checkPermissionTo('force-delete RekapNilai');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any RekapNilai');
    }
}
