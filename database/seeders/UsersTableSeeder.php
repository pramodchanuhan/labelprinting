<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'pramod',
                'email' => 'pramod@gmail.com',
                'role' => 0,
                'email_verified_at' => NULL,
                'password' => '$2y$12$cGqFQ8cSoZap8rvxNa1J1.4jAP6/2dee962ZxEChraS0ZC2sMTf7e',
                'remember_token' => NULL,
                'created_at' => '2024-09-19 10:14:57',
                'updated_at' => '2024-09-19 10:14:57',
            ),
        ));
        
        
    }
}