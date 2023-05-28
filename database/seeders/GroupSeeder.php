<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Group::create([
        //     'groupname' => 'admingroup'
        // ]);
        Group::create([
            'groupname' => 'teacher'
        ]);
        Group::create([
            'groupname' => 'student'
        ]);
    }
}
