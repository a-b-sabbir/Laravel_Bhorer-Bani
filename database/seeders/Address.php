<?php

namespace Database\Seeders;

use App\Models\UserAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class address extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAddress::create([
                'user_id' => 2,
                'permanent_district' => 'Dhaka',
                'permanent_sub_district' => 'Savar',
                'permanent_municipality' => 'Savar Municipality',
                'permanent_ward' => 5,
                'permanent_post_code' => '1340',
                'permanent_village_locality' => 'Ashulia',
                'permanent_house_road_number' => 'House-12, Road-3',
                'current_district' => 'Dhaka',
                'current_sub_district' => 'Mirpur',
                'current_municipality' => 'Mirpur Municipality',
                'current_ward' => 7,
                'current_post_code' => '1216',
                'current_village_locality' => 'Kazipara',
                'current_house_road_number' => 'House-22, Road-10'
        ]);
    }
}
