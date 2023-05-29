<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::all();
        $files = File::all();
        return view('filepage', compact('files','folders'));
    }

    public function create(Request $request){
        $incomingdata = $request->validate([

            'foldername' => ['required','max:40',Rule::unique('folders', 'foldername')]
        ]);
            
            Storage::createDirectory("server storage".DIRECTORY_SEPARATOR.$incomingdata['foldername']);
            Folder::create($incomingdata);
            //return var_dump($foldername);
            return redirect()->back()->with('succsess','Папка успішно створена');
        }

    public function delete(Request $request , $folder){
        //Storage::deleteDirectory($path);

        
        return redirect()->back()->with('succsess','Папка успішно створена');
    }
}
