<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models (e.g., list all users in an admin panel).
     * Requires the 'view-users' permission.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-users');
    }

    /**
     * Determine whether the user can view a specific user's profile.
     * Allows viewing if the user has 'view-users' permission OR if they are viewing their own profile.
     */
    public function specificView(User $user, User $model): bool
    {
        return $user->can('view-specific-user') || $user->id === $model->id;
    }

    /**
     * Determine whether the user can create new user accounts.
     * Requires the 'create-users' permission.
     */
    public function create(User $user): bool
    {
        return $user->can('create-user');
    }

    /**
     * Determine whether the user can update a specific user's profile.
     * Allows updating if the user has 'edit-users' permission OR if they are updating their own profile.
     */
    public function update(User $user, User $model): bool
    {
        return $user->can('edit-user');
    }

    /**
     * Determine whether the user can delete a specific user account.
     * Requires the 'delete-users' permission. Prevents a user from deleting themselves.
     */
    public function delete(User $user, User $model): bool
    {
        // A user cannot delete themselves
        if ($user->id === $model->id) {
            return false;
        }

        return $user->can('delete-user');
    }

    /**
     * Determine whether the user can restore a soft-deleted user.
     * Requires the 'restore-users' permission. (Assumes soft deletes are enabled for User model).
     */
    public function restore(User $user, User $model): bool
    {
        return $user->can('restore-users');
    }

    /**
     * Determine whether the user can permanently delete a user.
     * Requires the 'force-delete-users' permission. Prevents a user from permanently deleting themselves.
     * (Assumes soft deletes are enabled for User model).
     */
    public function forceDelete(User $user, User $model): bool
    {
        // A user cannot force delete themselves
        if ($user->id === $model->id) {
            return false;
        }
        
        return $user->can('force-delete-users');
    }
}