<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('filepage');
    }


    public function store(Request $request)
    {

        if($file = $request->hasFile('inputGroupFile04')){
            $file = $request->file('inputGroupFile04');
            
            $file->storeAs('server storage',$file->getClientOriginalName());
            return redirect()->back()->with('success','Файл успішно завантажений');
        }
        else return redirect()->back()->with('error','файл не вибраний');
        
    }

    public function show(){

        $files = Storage::allFiles('server storage');

        return var_dump($files);
    }
}
