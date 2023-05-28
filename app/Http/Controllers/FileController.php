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
    public function index()
    {
        $folders = Folder::all();
        $files = File::all();
        return view('filepage', compact('files','folders'));
    }


    public function upload(Request $request)
    {   
        //TODO: make support for folder 
        //check if the file exists

        
        if ($file = $request->hasFile('inputGroupFile04')) {
            //take file from request
            $file = $request->file('inputGroupFile04');
            //check if file exists in database
            if (!File::where('filename', $file->getClientOriginalName())->exists()) {
                //save file in folder
                $file->storeAs('server storage', $file->getClientOriginalName());
                //take a path
                $path = 'server storage' . DIRECTORY_SEPARATOR . $file->getClientOriginalName();
                //save file in database
                File::create([
                    'filename' => basename($path),
                    'filesize' => Storage::size($path),
                    'filepath' => $path
                ]);
                return redirect()->back()->with('success', 'Файл успішно завантажений');

            } 
            else {
                return redirect()->back()->with('error', 'Такий файл вже існує');
            } 

        } else return redirect()->back()->with('error', 'файл не вибраний');
    }




    public function show()
    {

        File::truncate();
        Folder::truncate();
    }
}
