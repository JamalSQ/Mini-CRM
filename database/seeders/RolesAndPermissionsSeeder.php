<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User; // Assuming you want to assign roles/permissions to a user here
use Illuminate\Support\Facades\Hash;

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
        Permission::firstOrCreate(['name' => 'view-specific-user']);
        Permission::firstOrCreate(['name' => 'create-user']);
        Permission::firstOrCreate(['name' => 'edit-user']);
        Permission::firstOrCreate(['name' => 'delete-user']);

        Permission::firstOrCreate(['name' => 'view-clients']);
        Permission::firstOrCreate(['name' => 'view-specific-client']);
        Permission::firstOrCreate(['name' => 'create-client']);
        Permission::firstOrCreate(['name' => 'edit-client']);
        Permission::firstOrCreate(['name' => 'delete-client']);

        Permission::firstOrCreate(['name' => 'view-projects']);
        Permission::firstOrCreate(['name' => 'view-specific-project']);
        Permission::firstOrCreate(['name' => 'create-project']);
        Permission::firstOrCreate(['name' => 'edit-project']);
        Permission::firstOrCreate(['name' => 'delete-project']);

        Permission::firstOrCreate(['name' => 'view-tasks']);
        Permission::firstOrCreate(['name' => 'view-specific-task']);
        Permission::firstOrCreate(['name' => 'create-task']);
        Permission::firstOrCreate(['name' => 'edit-task']);
        Permission::firstOrCreate(['name' => 'delete-task']);

        Permission::firstOrCreate(['name' => 'view-roles']);
        Permission::firstOrCreate(['name' => 'view-specific-role']);
        Permission::firstOrCreate(['name' => 'create-role']);
        Permission::firstOrCreate(['name' => 'edit-role']);
        Permission::firstOrCreate(['name' => 'delete-role']);

        // Create Roles and assign created permissions
        $adminRole = Role::firstOrCreate(['name' => 'superAdmin']);
        $adminRole->givePermissionTo(Permission::all()); // Admin gets all permissions


        $superAdminUser = User::firstOrCreate(
            ['email' => 'editor@example.com'],
            [
                'first_name' => 'Editor',
                'last_name' => 'User',
                'phone_number' => '0987654321',
                'address' => 'Pakistan',
                'password' => Hash::make('password'),
                'is_active' => true,
            ]
        );

        $superAdminUser->assignRole('superAdmin');
    }
}