<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Folder::create([
            'id' => 1,
            'foldername'=>'storage',
            'folderpath'=>public_path('storage'. DIRECTORY_SEPARATOR) 
        ]);
        // TODO: make auto create folder
    }
}
