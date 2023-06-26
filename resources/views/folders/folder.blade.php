@extends('layouts.layout')

@section('title', 'File page')
{{-- header пока-шо заглушка --}}
@include('layouts.partials.header')
@section('content')

    <nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
        <div class="container">
            <ul class="navbar-nav fs-5">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#fileupload">
                        <i class='bx bxs-file-plus'></i>
                        Додати файл
                    </a>
                </li>
                @can('can edit')
                    <li class="nav-item ms-2">
                        <a class="nav-link active" href="#foldercreate">
                            <i class='bx bxs-folder-plus'></i>
                            Додати папку
                        </a>
                    </li>
                @endcan
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
    @include('layouts.popup.fileupload')
    {{-- Form for creating folders --}}
    @include('layouts.popup.foldercreate' , $folder)
    <div class="container">

        <div>
            @if ($folder->parent->id > 1)
                <a class="fs-3 align-middle text-decoration-none link-secondary"
                    href="{{ route('folder.index', $folder->parent->id) }}">
                    <i class='bx bx-arrow-back mx-2 align-middle'></i>Повернутись назад
                </a>
            @else
                <a class="fs-3 align-middle text-decoration-none link-secondary" href="{{ route('folder.rootindex') }}">
                    <i class='bx bx-arrow-back mx-2 align-middle'></i>Повернутись назад
                </a>
            @endif

        </div>
        <table class="table table-hover caption-top">
            <caption class="fs-2 fw-bold">{{ $folder->foldername }}</caption>
            <thead>
                <th class="fs-5 fw-light ">Назва </th>
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
                                    <form method="GET" id="filedownload{{ $file->id }}"
                                        action="{{ route('file.preview', $file) }}">
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
