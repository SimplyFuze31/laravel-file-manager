@extends('layouts.layout')

@section('title', 'File page')
{{-- header пока-шо заглушка --}}
@include('layouts.partials.header')
@section('content')
    @can('can edit')
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
            <div class="container">
                <ul class="navbar-nav fs-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#fileupload">
                            <i class='bx bxs-file-plus'></i>
                            Додати файл
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link active" href="#foldercreate">
                            <i class='bx bxs-folder-plus'></i>
                            Додати папку
                        </a>
                    </li>
                    @role('admin')
                        <li class="nav-item ms-2">
                            <a class="nav-link active" href="{{ route('users.index') }}">
                                <i class='bx bxs-user fs-4'></i>
                                Користувачі
                            </a>
                        </li>
                    @endrole
                </ul>
            </div>
            {{-- <form>
                <input type="search" class="form-control" placeholder="Find user here" name="search"
                    value="{{ request('search') }}">
            </form> --}}

        </nav>
    @endcan


    {{-- Popup window --}}
    {{-- Form for uploading files --}}
    <div id="fileupload" class="overlay">
        <div class="popup">
            <h2 class="mt-3 fs-2 fw-bold text-secondary">Додати новий файл</h2>
            <a class="close" href="#">&times;</a>

            <div class="content">
                <form method="POST" action="{{ route('file.upload', 1) }}" enctype="multipart/form-data"class="mt-3 w-75">
                    @csrf
                    <div class="input-group">
                        <input multiple type="file" class="form-control mw-100" name="inputGroupFile04"
                            id="inputGroupFile04">
                        <button type="submit" class="btn btn-primary">Додати файл</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Form for creating folders --}}
    <div id="foldercreate" class="overlay">
        <div class="popup">
            <h2 class="mt-3 fs-2 fw-bold text-secondary">Додати нову папку</h2>
            <a class="close" href="#">&times;</a>

            <div class="content">
                <form method="POST" action="{{ route('folder.create') }}" enctype="multipart/form-data" class="mt-3 w-75">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control mw-100" name="foldername" id="inputFoldername">
                        <button type="submit" class="btn btn-primary">Додати папку</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    {{-- right info side --}}
    <div class="container">
        @include('layouts.partials.messages')
        <table class="table table-hover caption-top">
            <caption class="fs-2 fw-bold">Файли</caption>
            <thead>
                <th class="fs-5 fw-light ">Назва </th>
                <th class=""></th>
            </thead>
            <tbody class="filepage-tbody">
                {{-- table rows --}}
                @forelse ($folders as $folder)
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ route('folder.index', $folder) }}" class="text-decoration-none link-dark">
                                        <i class="bx bxs-folder text-secondary fs-3"></i>
                                        {{ $folder->foldername }}
                                    </a>
                                </div>
                                <div>
                                    @can('can edit')
                                        <form action="{{ route('folder.destroy', $folder) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Впевнені що хочете видалити?')">Видалити</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse

                @forelse ($files as $file)
                    <tr class="">
                        <td>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <form method="POST" id="filedownload{{ $file->id }}"
                                        action="{{ route('file.download', $file) }}">
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('filedownload{{ $file->id }}').submit()"
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
                    @if (count($folders) === 0)
                        <tr>
                            <td colspan="2">Немає файлів та папок</td>
                        </tr>
                    @endif
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
