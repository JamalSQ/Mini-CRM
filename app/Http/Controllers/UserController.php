<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatedUserRequest;
use App\Models\User;
use App\Utils\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
             $user = User::create($request->validated());
             $user->assignRole($request->role);
            return Reply::success('User record created successfylly', 200, route('users.index'));
        } catch (\Exception $e) {
            return Reply::error('Unable to create user', 422, route('users.index'), $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('roles');
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user->load('roles');
        $roles = Role::all();
        $userRoleIds = $user->roles->pluck('id')->toArray();

        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoleIds' => $userRoleIds, // Pass this to the view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user,UpdatedUserRequest $updated_user_request)
    {
        try {
            $user->update($updated_user_request->validated());
            $user->syncRoles([$request->role]);
            return Reply::success('User updated successfylly', 200, route('users.index'));
        } catch (\Exception $e) {
            return Reply::error('Unable to update user', 422, route('users.index'), $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            //  Before deleting the user, you might want to remove their roles/permissions
            // though the package's foreign keys usually handle this on cascade delete.
            $user->syncRoles([]); // Remove all roles
            $user->syncPermissions([]); // Remove all direct permissions
            $user->delete();
            return Reply::success("User deleted successfully", 200, route('users.index'));
        } catch (\Exception $e) {
            return Reply::error("unable to delete the user", 422," ", $e,);
        }
    }
}
