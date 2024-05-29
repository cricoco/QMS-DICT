<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'DICTQMSADMIN',
            'email' => 'dictqmsadmin@dict.gov.ph',
            'password' => bcrypt('DI(v@1dj6VDem@N1a1vLKa1);;CT==R9'),
            'role_id' => '1',
            'designation' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
            'is_verifiedman' => '1',
        ]);
    }
}
