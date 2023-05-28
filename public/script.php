<?php

namespace App\Console;
use App\Models\Folder;
use App\Models\User;


Folder::create([
    'groupname' => 'admingroup'
]);

User::create([

    'name' => 'admin',
    'email' => 'olexandrkondratiuk@vsplphpk.onmicrosoft.com',
    'password' => bcrypt('admin123'),
    'group_id' => 1

]);

