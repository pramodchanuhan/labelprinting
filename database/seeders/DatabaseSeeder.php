<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'abc@gmail.com',
        //     'password'=>123456789,
        // ]);


        $this->call(CompanyInfoSeeder::class);

        // $this->call(AdminSeeder::class);
        // $this->call(PermissionSeeder::class);
        // $this->call(RoleSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LabelprintfromTableSeeder::class);
    }
}
