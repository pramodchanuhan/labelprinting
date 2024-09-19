<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Role::create(['name' => 'admin']);

        $hrManager=Role::create(['name' => 'hr manager']);
        $hrManagerPermissions=[
            'iaf access',
            'iaf create',
            'iaf edit',
            'iaf show',
            'iaf delete',
            'iaf asign hr',
        ];
        $hrManager->givePermissionTo($hrManagerPermissions);

        $hr=Role::create(['name' => 'hr']);
        $hrPermissions=[
            'iaf access',
            'iaf edit',
            'iaf show',
            'iaf delete',
        ];
        $hr->givePermissionTo($hrPermissions);

        $itManager=Role::create(['name' => 'it manager']);
        $itManagerPermissions=[
            'iaf access',
            'iaf edit',
            'iaf show',
            'iaf delete',
            'iaf interview',
        ];
        $itManager->givePermissionTo($itManagerPermissions);

        $SdManager=Role::create(['name' => 'sd manager']);
        $SdManagerPermissions=[
            'iaf access',
            'iaf edit',
            'iaf show',
            'iaf delete',
            'iaf interview',
        ];
        $SdManager->givePermissionTo($SdManagerPermissions);

        $CEO=Role::create(['name' => 'ceo']);
        $CEOPermissions=[
            'iaf access',
            'iaf edit',
            'iaf show',
            'iaf delete',
            // 'iaf interview',
        ];
        $CEO->givePermissionTo($CEOPermissions);

        Role::create(['name' => 'tech lead']);
        Role::create(['name' => 'senior software developer']);
        Role::create(['name' => 'software developer']);

        Role::create(['name' => 'employee']);


    }
}
