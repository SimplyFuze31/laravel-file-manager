<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Models\File as FileData;
use Illuminate\Support\Facades\File;

class FolderController extends Controller
{
    public function rootindex()
    {   
        $folder = Folder::find(1);
        if(request('search')){

        }else{
            $folders = $folder->children()->get();
            $files = $folder->files()->get();
            return view('folders.index', compact('files', 'folders'));
        }

    }
    public function index(Folder $folder)
    {
        $files = $folder->files()->get();
        $folders = $folder->children()->get();
        return view('folders.folder', compact('files', 'folder' , 'folders'));
    }

    public function create(Request $request, Folder $folder)
    {
        if($folder->id === null) 
            $folder = Folder::find(1);

        $incomingdata = $request->validate([

            'foldername' => ['required','max:40']
        ]);
        $incomingdata['folderpath'] = $folder->folderpath . $incomingdata['foldername'] . DIRECTORY_SEPARATOR;
        $incomingdata['parent_id'] = $folder->id;
        File::makeDirectory($incomingdata['folderpath'], 0755, true);
        Folder::create($incomingdata);
        //return var_dump($foldername);
        return redirect()->back()->with('succsess', 'Папка успішно створена');
    }

    public function delete(Folder $folder)
    {

        File::deleteDirectory($folder->folderpath);
        $folder->delete();

        return redirect()->back()->with('succsess', 'Папка успішно видалена');
    }
}
