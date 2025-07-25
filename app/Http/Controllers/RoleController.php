<?php

namespace App\Http\Controllers;

use App\Http\Requests\roleRequest;
use App\Services\RoleService;
use App\Utils\Reply;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public $roleService;

    function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, roleRequest $roleRequest)
    {
        $status = $this->roleService->storeRole($request);
        if ($status) {
            return Reply::success('Role created successfully', 200, route('roles.index'));
        } else {
            return Reply::error('Failed to create the role. Please try again.', 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', ['role' => $role, 'permissions' => Permission::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role, roleRequest $roleRequest)
    {
        $status = $this->roleService->updateRole($request, $role);

        if ($status) {
            return Reply::success('Role and permissions updated successfully', 200, route('roles.index'));
        } else {
            return Reply::error('Failed to update the role and permissions. Please try again.', 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return Reply::success('Role deleted successfully', 200, route('roles.index'));
        } catch (\Exception $e) {
            \Log::error("Error creating role: " . $e->getMessage() . " on line " . $e->getLine() . " in " . $e->getFile());
            return Reply::error('Failed to delete the role. Please try again.', 422);
        }
    }
}
