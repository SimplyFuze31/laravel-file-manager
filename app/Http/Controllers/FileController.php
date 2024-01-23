<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\File as DataFile;
use Illuminate\Support\Facades\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request, Folder $folder)
    {   

        // echo $folder->id;
        // echo '<br>';
        // echo $folder->foldername;
        // echo '<br>';
        // echo $folder->folderpath;
        // echo '<br>';
        // echo $folder->parent_id;
        if($folder->id === null) 
            $folder = Folder::find(1);
        if ($file = $request->hasFile('inputGroupFile04')) {
            //take file from request
            $file = $request->file('inputGroupFile04');
            $path = $folder->folderpath;
            
            //check if file exists in database
            if (!file_exists($path.$file->getClientOriginalName())) {
                
                $file->move($path, $file->getClientOriginalName());

                //save file in database
                DataFile::create([
                    'filename' => basename($path),
                    'filesize' => File::size($path . $file->getClientOriginalName()),
                    'filepath' => $path . $file->getClientOriginalName(),
                    'folder_id' => $folder->id
                ]);
                return redirect()->back()->with('success', 'Файл успішно завантажений');
            } else {
                
                 return redirect()->back()->with('error', 'Такий файл вже існує');
            }
        } else return redirect()->back()->with('error', 'файл не вибраний');
    }
    public function preview(DataFile $file)
    {
        // Перевірити, чи існує файл у сховищі
        $path = $file->filepath;
        if (!File::exists($path)) {
            abort(404);
        }
    
        // Повернути файл як HTTP-відповідь
        return response()->file($path);
    }
    public function delete(DataFile $file)
    {

        File::delete($file->filepath);
        $file->delete();
        return redirect()->back();
    }

    public function download(DataFile $file)
    {

        return response()->download($file->filepath);
    }
}
