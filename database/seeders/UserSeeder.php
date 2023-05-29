<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    User::create([
        'name' => 'admin',
        'email' => 'olexandrkondratiuk@vsplphpk.onmicrosoft.com',
        'password' => bcrypt('admin123'),
        'group_id' => 1
    ]);
    // User::create([
    //     'name' => 'Teacher',
    //     'email' => 'sashakondratiuk@vsplphpk.onmicrosoft.com',
    //     'password' => bcrypt('admin123'),
    //     'group_id' => 2
    // ]);
    // User::create([
    //     'name' => 'Student',
    //     'email' => 'alehandrokondratiuk@vsplphpk.onmicrosoft.com',
    //     'password' => bcrypt('admin123'),
    //     'group_id' => 3
    // ]);
    }
}
