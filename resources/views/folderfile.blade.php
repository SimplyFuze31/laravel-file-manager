@extends('layouts.layout')

@section('title', 'File page')

@section('content')


<h1>{{$folder->foldername}} </h1>
<a href="/folders">Повернутись назад</a>

<div class="row container-lg justify-content-center">

    {{-- left toolbar side  --}}
    <div class="col-5 mt-3">

        <div class="border border-success roundeds">
            <h3 class="mt-3 fs-2 fw-bold text-secondary">Додати новий файл</h3>
            <form method="POST" action="{{ route('file.upload',$folder) }}" enctype="multipart/form-data" class="mt-3 w-75">
                @csrf
                <div class="input-group">
                    <input type="file" class="form-control mw-100" name="inputGroupFile04" id="inputGroupFile04">
                    <button type="submit" class="btn btn-primary">Додати файл</button>
                </div>
            </form>
            
        </div>
    </div>


    {{-- я короче зробив таблички шоб їх можна було скролити це канєшно убого виглядить --}}
    {{-- right info side --}}
    <div class="col-6 mt-3 pt-2 ms-3 border border-success rounded">
        <table class="table table-hover caption-top">
            <caption class="fs-2 fw-bold">Папки</caption>
        <thead>
            <th class="fs-5 fw-light ">Назва </th>
            <th class=""></th>
        </thead>
        <tbody> 
            @forelse ($files as $file)
            <tr class="w-100">
                <td class="w-75">
                    <i class="bx bxs-file text-secondary fs-3"></i>
                    {{ basename($file->filepath) }}
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            •••
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <form method="POST" action="{{ route('file.download', $file) }}">
                                    @csrf
                                    <div class="modal-footer">
                                        <button type="submit" class="btn " style="color: green">Завантажити</button>
                                    </div>
                                </form>
                            </li>
                            <li>                                            
                                <form method="POST" action="{{ route('file.destroy', $file) }}">
                                @csrf
                                @method('delete')
                                <div class="modal-footer">
                                    <button type="submit" class="btn" style="color: red">Видалити</button>
                                </div>
                            </form></li>

                        </ul>
                    </div>
                </td>
            </tr>
        @empty
            <td colspan="2">Немає наявних файлів</td>
        @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection
