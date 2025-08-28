<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AspekPenguranganNilai;
use App\Models\User;

class AspekPenguranganNilaiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AspekPenguranganNilai $aspekpengurangannilai): bool
    {
        return $user->checkPermissionTo('view AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AspekPenguranganNilai $aspekpengurangannilai): bool
    {
        return $user->checkPermissionTo('update AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AspekPenguranganNilai $aspekpengurangannilai): bool
    {
        return $user->checkPermissionTo('delete AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AspekPenguranganNilai $aspekpengurangannilai): bool
    {
        return $user->checkPermissionTo('restore AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, AspekPenguranganNilai $aspekpengurangannilai): bool
    {
        return $user->checkPermissionTo('replicate AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AspekPenguranganNilai $aspekpengurangannilai): bool
    {
        return $user->checkPermissionTo('force-delete AspekPenguranganNilai');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any AspekPenguranganNilai');
    }
}
