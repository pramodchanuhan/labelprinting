<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'user management access',

            'permission create',
            'permission edit',
            'permission show',
            'permission delete',
            'permission access',

            'role create',
            'role edit',
            'role show',
            'role delete',
            'role access',

            'user create',
            'user edit',
            'user show',
            'user delete',
            'user access',

            'iaf create',
            'iaf edit',
            'iaf show',
            'iaf delete',
            'iaf asign hr',
            'iaf access',

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        // // gets all permissions via Gate::before rule; see AuthServiceProvider
        // Role::create(['name' => 'super sdmin']);

        // $user = Role::create(['name' => 'user']);

        // $userPermissions = [
        //     'user show',
        // ];

        // // foreach ($userPermissions as $permission) {
        // //     $user->givePermissionTo($permission);
        // // }
        // $user->givePermissionTo($userPermissions);

    }
}
