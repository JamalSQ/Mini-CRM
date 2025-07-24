<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User; // Assuming you want to assign roles/permissions to a user here

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        Permission::firstOrCreate(['name' => 'view-users']);
        Permission::firstOrCreate(['name' => 'create-users']);
        Permission::firstOrCreate(['name' => 'edit-users']);
        Permission::firstOrCreate(['name' => 'delete-users']);

        Permission::firstOrCreate(['name' => 'view-clients']);
        Permission::firstOrCreate(['name' => 'create-clients']);
        Permission::firstOrCreate(['name' => 'edit-clients']);
        Permission::firstOrCreate(['name' => 'delete-clients']);

        Permission::firstOrCreate(['name' => 'view-projects']);
        Permission::firstOrCreate(['name' => 'create-projects']);
        Permission::firstOrCreate(['name' => 'edit-projects']);
        Permission::firstOrCreate(['name' => 'delete-projects']);

        Permission::firstOrCreate(['name' => 'view-tasks']);
        Permission::firstOrCreate(['name' => 'create-tasks']);
        Permission::firstOrCreate(['name' => 'edit-tasks']);
        Permission::firstOrCreate(['name' => 'delete-tasks']);

        // Create Roles and assign created permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all()); // Admin gets all permissions

        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $editorRole->givePermissionTo(['edit-projects', 'edit-clients', 'edit-tasks','edit-users']); // Editor can edit projects, clients, tasks, and users

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->givePermissionTo(['view-projects']); // Basic user can only view posts

        // Assign Roles to Users (optional, for testing)
        $user = User::find(1); // Assuming user with ID 1 exists
        if ($user) {
            $user->assignRole('admin');
        }

        $user2 = User::find(2); // Assuming user with ID 2 exists
        if ($user2) {
            $user2->assignRole('editor');
        }

        $user3 = User::find(3); // Assuming user with ID 3 exists
        if ($user3) {
            $user3->assignRole('user');
        }
    }
}