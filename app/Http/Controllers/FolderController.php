<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Models\File as FileData;
use Illuminate\Support\Facades\File;

class FolderController extends Controller
{
    public function index(?Folder $folder)
    {
        // var_dump($folder);
        if($folder->id === null){

            $folders = Folder::all()->where('id', '>' , 1);
            $files = FileData::all()->where('folder_id',  1);
            return view('folders.index', compact('files','folders'));
        }else{
            $files = FileData::all()->where('folder_id' ,'=' ,$folder->id);
            return view('folders.folder',compact('files', 'folder'));
        }

        

    }

    public function create(Request $request){
        $incomingdata = $request->validate([

            'foldername' => ['required','max:40']
        ]); 
            $path = public_path('storage').DIRECTORY_SEPARATOR.$incomingdata['foldername'].DIRECTORY_SEPARATOR;
            $incomingdata['folderpath'] = $path;
            File::makeDirectory($path, 0755, true);
            Folder::create($incomingdata);
            //return var_dump($foldername);
            return redirect()->back()->with('succsess','Папка успішно створена');
        }

    public function delete(Folder $folder){
        
        File::deleteDirectory($folder->folderpath);
        $folder->delete();

        return redirect()->back()->with('succsess','Папка успішно видалена');
    }
}
