<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
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

        // Define all permissions
        $permissions = [
            // Users
            'view-users', 'view-specific-user', 'create-user', 'edit-user', 'delete-user',
            // Clients
            'view-clients', 'view-specific-client', 'create-client', 'edit-client', 'delete-client',
            // Projects
            'view-projects', 'view-specific-project', 'create-project', 'edit-project', 'delete-project',
            // Tasks
            'view-tasks', 'view-specific-task', 'create-task', 'edit-task', 'delete-task',
            // Roles
            'view-roles', 'view-specific-role', 'create-role', 'edit-role', 'delete-role',
        ];

        // Create all permissions if they don't exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // --- Create Roles and assign permissions ---

        // 1. Super Admin Role: Gets all permissions
        $superAdminRole = Role::firstOrCreate(['name' => 'superAdmin']);
        $superAdminRole->givePermissionTo(Permission::all());

        // 2. Admin Role: Gets all permissions except role management
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminPermissions = Permission::whereNotIn('name', [
            'view-roles', 'view-specific-role', 'create-role', 'edit-role', 'delete-role'
        ])->pluck('name');
        $adminRole->syncPermissions($adminPermissions); // Use syncPermissions to ensure only these are assigned

        // 3. User Role: Gets only 'view' and 'view-specific' permissions
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userPermissions = Permission::whereIn('name', [
            'view-users', 'view-specific-user',
            'view-clients', 'view-specific-client',
            'view-projects', 'view-specific-project',
            'view-tasks', 'view-specific-task',
        ])->pluck('name');
        $userRole->syncPermissions($userPermissions);

        // --- Create Users and assign roles ---

        $superadminUser = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'phone_number' => '0987654321',
                'address' => 'Pakistan',
                'password' => Hash::make('12345'),
                'is_active' => true,
            ]
        );
        $superadminUser->assignRole('superAdmin');

        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'phone_number' => '1122334455',
                'address' => 'Pakistan',
                'password' => Hash::make('12345'),
                'is_active' => true,
            ]
        );
        $adminUser->assignRole('admin');

        $regularUser = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'first_name' => 'Regular',
                'last_name' => 'User',
                'phone_number' => '9988776655',
                'address' => 'Pakistan',
                'password' => Hash::make('12345'),
                'is_active' => true,
            ]
        );
        $regularUser->assignRole('user');
    }
}