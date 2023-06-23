@extends('layouts.layout')

@section('title', $folder->foldername)

@section('content')
    
    @can('can edit')
    <div class="container">
        <a class="fs-5 btn btn-primary my-3  " href="/folders">Повернутись назад</a>
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-3">
                    <ul class="navbar-nav fs-5">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#fileupload">
                                <i class='bx bxs-file-plus'></i>
                                Додати файл
                            </a>
                        </li>
                    </ul>

            {{--        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        </nav>
    </div>
    @endcan


    @include('layouts.popup.fileupload')

    {{-- Table --}}
    <div class="container mt-3">
            <table class="table table-hover caption-top">
                <caption class="fs-2 fw-bold">{{ $folder->foldername }}</caption>
                <thead>
                    <th class="fs-5 fw-light ">Назва </th>
                </thead>
                <tbody>
                    @forelse ($files as $file)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <form method="GET" id="filepreview{{ $file->id }}"
                                            action="{{ route('file.preview', $file) }}">
                                            @csrf
                                            <a href="#"
                                                onclick="document.getElementById('filepreview{{ $file->id }}').submit()"
                                                class="text-decoration-none link-dark">
                                                <i class="bx bxs-file text-secondary fs-3"></i>
                                                {{ basename($file->filepath) }}
                                            </a>
                                        </form>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        @include('layouts.partials.filedropdown')
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">Немає файлів та папок</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

    </div>

@endsection
