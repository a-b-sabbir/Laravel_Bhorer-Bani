<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'image' => 'habib.png',
            'email' => 'test@gmail.com',
            'password' => Hash::make('11111111'),
            'name' => 'Habib',
            'first_name' => 'Habib',
            'last_name' => 'Pa',
            'father_name' => 'OOP',
            'mother_name' => 'OOP',
            'mobile_number' => '014541221144',
            'whatsapp_number' => '012454544554',
            'dob' => '2000-01-22',
            'education_qualifications' => 'Bachelor in CS',
            'national_id' => '01245874101',
            'interested_position' => 'Software Engineer',
            'responsible_place_name' => 'Dhaka',
            'accept_terms_conditions' => true,
            'role_id'=>3,
        ]);
        User::create([
            'image' => 'habib.png',
            'email' => 'ta@gmail.com',
            'password' => Hash::make('11111111'),
            'name' => 'Habib',
            'first_name' => 'Habib',
            'last_name' => 'Pa',
            'father_name' => 'OOP',
            'mother_name' => 'OOP',
            'mobile_number' => '014541221104',
            'whatsapp_number' => '012454540554',
            'dob' => '2000-01-22',
            'education_qualifications' => 'Bachelor in CS',
            'national_id' => '01245874141',
            'interested_position' => 'Software Engineer',
            'responsible_place_name' => 'Dhaka',
            'accept_terms_conditions' => true,
            'role_id'=>2,
        ]);
        User::create([
            'image' => 'habib.png',
            'email' => 'tes@gmail.com',
            'password' => Hash::make('11111111'),
            'name' => 'Habib',
            'first_name' => 'Habib',
            'last_name' => 'Pa',
            'father_name' => 'OOP',
            'mother_name' => 'OOP',
            'mobile_number' => '0141541221104',
            'whatsapp_number' => '0120454540554',
            'dob' => '2000-01-22',
            'education_qualifications' => 'Bachelor in CS',
            'national_id' => '01245874142',
            'interested_position' => 'Software Engineer',
            'responsible_place_name' => 'Dhaka',
            'accept_terms_conditions' => true,
            'role_id'=>1,
        ]);
    }
}
