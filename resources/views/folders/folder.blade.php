@extends('layouts.layout')

@section('title', $folder->foldername)

@section('content')

    <a class="fs-4 " href="/folders">Повернутись назад</a>
    @can('can edit')
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav fs-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#fileupload">
                            <i class='bx bxs-file-plus'></i>
                            Додати файл
                        </a>
                    </li>
                </ul>
            </div>
            {{--        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        </nav>
    @endcan


    @include('layouts.popup.fileupload')

    {{-- Table --}}
    <div class="container">
        <div class="mt-3">
            <table class="table table-hover caption-top">
                <caption class="fs-2 fw-bold">{{ $folder->foldername }}</caption>
                <thead>
                    <th class="fs-5 fw-light ">Назва </th>
                    <th class=""></th>
                </thead>
                <tbody>
                    @forelse ($files as $file)
                        <tr>
                            <td class="w-75">
                                <i class="bx bxs-file text-secondary fs-3"></i>
                                {{ basename($file->filepath) }}
                            </td>
                            @include('layouts.partials.filedropdown')
                        </tr>
                    @empty
                        <td colspan="2">Немає наявних файлів</td>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

@endsection
