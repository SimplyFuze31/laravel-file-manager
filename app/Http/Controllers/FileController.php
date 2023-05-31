<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function upload(Request $request, ?Folder $folder)
    {   
        //check if the file exists
        if($folder->id === null){

            $folder = Folder::find(1);

        }
        
        if ($file = $request->hasFile('inputGroupFile04')) {
            //take file from request
            $file = $request->file('inputGroupFile04');
            $path = $folder->folderpath .  $file->getClientOriginalName();
            //check if file exists in database
            if (!File::find($path) ){
                //save file in folder
                $file->storeAs($folder->folderpath, $file->getClientOriginalName());
                //take a path

                //save file in database
                File::create([
                    'filename' => basename($path),
                    'filesize' => Storage::size($path),
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

    //TODO: make file delete
    public function delete(File $file){

        Storage::delete($file->filepath);
        $file->delete();
        return redirect()->back();

    }

    //TODO: make file download
    public function download(File $file){

        $path = storage_path('app'). DIRECTORY_SEPARATOR. $file->filepath;
        return response()->download($path);

    }


}
