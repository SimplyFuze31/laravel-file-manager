<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'can edit']);
        Permission::create(['name' => 'Acsess to student folder']);
        Permission::create(['name' => 'Acsess to teacher folder']);
        
        
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);

        $teacher->givePermissionTo(['can edit' , 'Acsess to student folder','Acsess to teacher folder']);
        $student->givePermissionTo('Acsess to student folder');
    }
}
