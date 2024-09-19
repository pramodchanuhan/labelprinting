<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $user=\App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'admin@gmail.com',
        //     'password'=>123456789,
        // ]);

        $user=User::firstOrCreate(['email' => 'admin@gmail.com'],
            ['name' => 'admin',
            'role' => 2,
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            'remember_token' => \Str::random(10),
        ]);

        $superAdmin=User::firstOrCreate(['email' => 'sadmin@gmail.com'],
            ['name' => 'super admin',
            'role' => 1,
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            'remember_token' => \Str::random(10),
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super admin']);

        $user->assignRole('admin');
        $superAdmin->assignRole('Super Admin');

    }
}
