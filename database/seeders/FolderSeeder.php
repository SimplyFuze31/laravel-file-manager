<?php

namespace Database\Seeders;

use App\Http\Controllers\FolderController;
use App\Models\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Folder::create([
            'id' => 1,
            'foldername'=>basename(env('STORAGE_PATH')),
            'folderpath'=> env('STORAGE_PATH'),
            'parent_id' => 0
        ]);
        File::makeDirectory(basename(env('STORAGE_PATH')), 0755, true);
    }
}
