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
    public function upload(Request $request, ?Folder $folder)
    {   
        //check if it is the root folder
        if($folder->id === null){

            $folder = Folder::find(1);

        }
        
        if ($file = $request->hasFile('inputGroupFile04')) {
            //take file from request
            $file = $request->file('inputGroupFile04');
            $path = $folder->folderpath .  $file->getClientOriginalName();
            //check if file exists in database
            if (!DataFile::find($path) ){
                //save file in folder
                File::put($path,$file);
                //$file->storeAs($folder->folderpath, $file->getClientOriginalName());
                //take a path

                //save file in database
                DataFile::create([
                    'filename' => basename($path),
                    'filesize' => File::size($path),
                    'filepath' => $path,
                    'folder_id' => $folder->id
                ]);
                return redirect()->back()->with('success', 'Файл успішно завантажений');

            } 
            else {
                return redirect()->back()->with('error', 'Такий файл вже існує');
            } 

        } else return redirect()->back()->with('error', 'файл не вибраний');
    }

    public function delete(DataFile $file){

        File::delete($file->filepath);
        $file->delete();
        return redirect()->back();

    }

    public function download(DataFile $file){

        return response()->download($file->filepath);

    }


}
