<?php

namespace App\Services;


use App\Utils\Reply;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleService
{
    public function storeRole(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $role = Role::create(['name' => $request->name]);
                if ($request->has('permissions') && is_array($request->permissions)) {
                    $role->syncPermissions($request->permissions);
                }
            });
            return true;
        } catch (\Exception $e) {
            \Log::error("Error creating role: " . $e->getMessage() . " on line " . $e->getLine() . " in " . $e->getFile());
            return false;
        }
    }

    public function updateRole(Request $request, Role $role)
    {
        try {
            DB::transaction(function () use ($request, $role) {
                $role->update(['name' => $request->name]);
                if ($request->has('permissions') && is_array($request->permissions)) {
                    $role->syncPermissions($request->permissions);
                } else {
                    $role->syncPermissions([]);
                }
            });
            return true;
        } catch (\Exception $e) {
            \Log::error("Error creating role: " . $e->getMessage() . " on line " . $e->getLine() . " in " . $e->getFile());
            return false;
        }
    }
}
