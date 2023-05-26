<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Foundation\Console\StorageLinkCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $folders = Storage::allDirectories('server storage');
        $files = File::all();
        return view('filepage', compact('files','folders'));
    }


    public function store(Request $request)
    {

        if ($file = $request->hasFile('inputGroupFile04')) {
            $file = $request->file('inputGroupFile04');

            if (!File::where('filename', $file->getClientOriginalName())->exists()) {

                $file->storeAs('server storage', $file->getClientOriginalName());
                $path = 'server storage' . DIRECTORY_SEPARATOR . $file->getClientOriginalName();
                $data = [
                    'filename' => basename($path),
                    'filesize' => Storage::size($path),
                    'filepath' => $path
                ];
                File::create($data);
                return redirect()->back()->with('success', 'Файл успішно завантажений');

            } 
            else {
                return redirect()->back()->with('error', 'Такий файл вже існує');
            } 

        } else return redirect()->back()->with('error', 'файл не вибраний');
        //return redirect()->back()->with('success','Файл успішно завантажений');*/
    }




    public function show()
    {

        return var_dump(Storage::allDirectories('server storage'));
    }
}
