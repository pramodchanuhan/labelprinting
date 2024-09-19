<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LabelprintfromTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('labelprintfrom')->delete();
        
        \DB::table('labelprintfrom')->insert(array (
            0 => 
            array (
                'id' => 1,
                'prefix' => 'Shri',
                'name' => 'Pramod',
                'address' => 'Noida',
                'local_area' => 'Noida',
                'city' => 'Noida',
                'district' => 'Bulandshahr',
                'state' => 'Uttar Pradesh',
                'zip_code' => '202394',
                'date_of_birth' => '2024-09-20',
                'partner_name' => 'Pramod',
                'anniversary' => '2024-09-20',
                'partner_dob' => '2024-09-20',
                'options' => '["VIP", "VVIP"]',
                'contact_person' => 'Pramod',
                'std_code' => '202394',
                'office' => 'noida',
                'office2' => 'noida',
                'resident' => 'noida',
                'fax' => '52154856',
                'mobile_no' => '8791956097',
                'mobile_no2' => '8791956097',
                'email' => 'pramodrajpoot886@gmail.com',
                'created_at' => '2024-09-19 10:40:08',
                'updated_at' => '2024-09-19 10:40:08',
            ),
            1 => 
            array (
                'id' => 2,
                'prefix' => 'Ofc',
                'name' => 'Yolanda Cherry',
                'address' => 'Et porro mollit ut n',
                'local_area' => 'Deserunt voluptas oc',
                'city' => 'Minim cupidatat rem',
                'district' => 'Omnis voluptate non',
                'state' => 'Eaque quaerat ea vol',
                'zip_code' => '41863',
                'date_of_birth' => '1975-05-27',
                'partner_name' => 'Maggy James',
                'anniversary' => '2011-12-05',
                'partner_dob' => '1976-10-04',
                'options' => '["VVIP", "PATRIKA", "NEWS", "GURU DHARAN", "KHATRIAGACH"]',
                'contact_person' => 'Sunt porro autem re',
                'std_code' => '8585858585',
                'office' => 'Fugiat delectus nul',
                'office2' => 'Accusantium harum fa',
                'resident' => 'Vel ut sint omnis ea',
            'fax' => '+1 (253) 487-7791',
                'mobile_no' => '50',
                'mobile_no2' => '79',
                'email' => 'beka@mailinator.com',
                'created_at' => '2024-09-19 10:47:03',
                'updated_at' => '2024-09-19 10:47:03',
            ),
            2 => 
            array (
                'id' => 3,
                'prefix' => 'Ms',
                'name' => 'Cecilia Fuller',
                'address' => 'Soluta sit voluptat',
                'local_area' => 'Vel voluptate aut qu',
                'city' => 'Delectus consequatu',
                'district' => 'Animi consequatur d',
                'state' => 'Velit fugiat volupt',
                'zip_code' => '91067',
                'date_of_birth' => '1982-08-25',
                'partner_name' => 'Abra Waters',
                'anniversary' => '2018-02-16',
                'partner_dob' => '2002-10-21',
                'options' => '["VVIP", "MANDIR", "NEWS", "KHATRIAGACH"]',
                'contact_person' => 'Anim excepturi corpo',
                'std_code' => '91',
                'office' => 'Vitae qui rerum dele',
                'office2' => 'Quibusdam ut deserun',
                'resident' => 'Officiis laborum sun',
            'fax' => '+1 (409) 836-4804',
                'mobile_no' => '25',
                'mobile_no2' => '80',
                'email' => 'guwaveruhi@mailinator.com',
                'created_at' => '2024-09-19 10:50:47',
                'updated_at' => '2024-09-19 10:50:47',
            ),
        ));
        
        
    }
}