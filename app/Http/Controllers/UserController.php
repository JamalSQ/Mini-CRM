<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatedUserRequest;
use App\Models\User;
use App\Utils\Reply;
use Illuminate\Http\Request;
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
        return view('users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
    
        $data = [
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'password'     => $request->password,
            'address'      => $request->address,
            'phone_number' => $request->phone_number,
            'is_active'    => $request->is_active,
        ];

        try {
            $user = User::create($data);
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
    public function update(Request $request, User $user, UpdatedUserRequest $updated_user_request)
    {
        $data = [
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'address'      => $request->address,
            'phone_number' => $request->phone_number,
            'is_active'    => $request->is_active,
        ];

        try {
            $user->update($data);
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
            $user->syncRoles([]); // Remove all roles
            $user->syncPermissions([]); // Remove all direct permissions
            $user->delete();
            return Reply::success("User deleted successfully", 200, route('users.index'));
        } catch (\Exception $e) {
            return Reply::error("unable to delete the user", 422, " ", $e,);
        }
    }
}
