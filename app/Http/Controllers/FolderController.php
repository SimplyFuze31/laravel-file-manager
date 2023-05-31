<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class FolderController extends Controller
{
    public function index(?Folder $folder)
    {
        // var_dump($folder);
        if($folder->id === null){

            $folders = Folder::all()->where('id', '>' , 1);
            $files = File::all()->where('folder_id',  1);
            return view('filepage', compact('files','folders'));
        }else{
            $files = File::all()->where('folder_id' ,'=' ,$folder->id);
            return view('folderfile',compact('files', 'folder'));
        }



    }

    public function show(Folder $folder){

    }
    public function create(Request $request){
        $incomingdata = $request->validate([

            'foldername' => ['required','max:40']
        ]); 
            $path = storage_path('app/server storage').DIRECTORY_SEPARATOR.$incomingdata['foldername'].DIRECTORY_SEPARATOR;
            $incomingdata['folderpath'] = $path;
            Storage::createDirectory($path);

            Folder::create($incomingdata);
            //return var_dump($foldername);
            return redirect()->back()->with('succsess','Папка успішно створена');
        }

    public function delete(Request $request , Folder $folder){
        
        Storage::deleteDirectory($folder->folderpath);
        $folder->delete();

        
        return redirect()->back()->with('succsess','Папка успішно видалена');
    }
}
