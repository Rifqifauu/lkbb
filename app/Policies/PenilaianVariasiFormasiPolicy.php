<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PenilaianVariasiFormasi;
use Illuminate\Auth\Access\HandlesAuthorization;

class PenilaianVariasiFormasiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenilaianVariasiFormasi $penilaianVariasiFormasi): bool
    {
        return $user->can('view_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenilaianVariasiFormasi $penilaianVariasiFormasi): bool
    {
        return $user->can('update_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenilaianVariasiFormasi $penilaianVariasiFormasi): bool
    {
        return $user->can('delete_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, PenilaianVariasiFormasi $penilaianVariasiFormasi): bool
    {
        return $user->can('force_delete_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, PenilaianVariasiFormasi $penilaianVariasiFormasi): bool
    {
        return $user->can('restore_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, PenilaianVariasiFormasi $penilaianVariasiFormasi): bool
    {
        return $user->can('replicate_penilaian::variasi::formasi');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_penilaian::variasi::formasi');
    }
}
