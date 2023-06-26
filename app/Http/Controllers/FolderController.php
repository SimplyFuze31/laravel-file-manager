<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Models\File as FileData;
use Illuminate\Support\Facades\File;

class FolderController extends Controller
{
    public function rootindex()
    {   
        $user = Auth::user();
        $folder = Folder::find(1);
        if(request('search')){

        }else{
            if ($user->hasRole('student')) {
                $folders = $folder->children()->permission('Acsess to student folder')->get();
                $files = $folder->files()->get();
                return view('folders.index', compact('files', 'folders'));
            }else{
                $folders = $folder->children()->get();
                $files = $folder->files()->get();
                return view('folders.index', compact('files', 'folders'));
            }

            
        }

    }
    public function index(Folder $folder)
    {
        //return var_dump($folder->foldername);
        $user = Auth::user();
        if ($user->hasRole('student')) {
            $folders = $folder->children()->permission('Acsess to student folder')->get();
            $files = $folder->files()->get();
            return view('folders.folder', compact('files', 'folders' , 'folder'));
        }else{
            $folders = $folder->children()->get();
            $files = $folder->files()->get();
            return view('folders.folder', compact('files', 'folders' , 'folder'));
        }

    }

    public function create(Request $request, Folder $folder)
    {
        //check if it's the root folder
        if($folder->id === null) 
            $folder = Folder::find(1);
        //validate data from request 
        $incomingdata = $request->validate([

            'foldername' => ['required','max:40'],
            'permissionselect' => 'required'
            
        ]);
        //generate path to folder
        $incomingdata['folderpath'] = $folder->folderpath . $incomingdata['foldername'] . DIRECTORY_SEPARATOR;
        //make folder in storage
        File::makeDirectory($incomingdata['folderpath'], 0755, true);
        //writing folder in db
        $folder = Folder::create([
            'foldername' => $incomingdata['foldername'],
            'folderpath' => $incomingdata['folderpath'],
            'parent_id' => $folder->id
        ]);
        //
        $folder->givePermissionTo($incomingdata['permissionselect']);
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
