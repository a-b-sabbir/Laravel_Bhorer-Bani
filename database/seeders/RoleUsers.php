<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
          'name' => 'Admin',
          'description' => 'ID:1 For Admin Role'
        ]);
        Role::create([
          'name' => 'Editor',
          'description' => 'ID:2 For Editor Role'
        ]);
        Role::create([
          'name' => 'Sub-Editor',
          'description' => 'ID:3 For Sub-Editor Role'
        ]);
        Role::create([
          'name' => 'Journalist ',
          'description' => 'ID:4 For Journalist  Role'
        ]);
        Role::create([
          'name' => 'Public ',
          'description' => 'ID:5 For Public  Role'
        ]);
    }
}
