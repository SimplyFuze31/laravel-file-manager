@extends('layouts')

@section('content')
    {{-- Nav bar --}}
    <nav class="navbar navbar-expand-sm bg-body-tertiary display-none-sm">
        <div class="container-fluid">
            <div class="container">
                {{-- Logo --}}
                <a class="navbar-brand navbar-toggler" href="#">
                    <img src="{{ asset('images/iconback.svg') }}" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top navbar-toggler-icon">
                    Повернутись на головну
                </a>
            </div>
            {{-- Search bar --}}
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        </div>
    </nav>

    <div class="container">

        <h2>Папки</h2>

        <div class="directorys-container mt-3">

            <div class="element">
                <a href="#" class="link-dark" style="text-decoration: none">
                <div class="element-body">
                  <h5 class="">Card title</h5>
                  </a>
                </div>
              </div>
        </div>


        <h2>Файли</h2>

        <div class="directorys-container mt-3">


        </div>

        @csrf

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <table class="file-table mt-3">
            <thead>
                <th>Назва файлу</th>
                <th>Розмір файлу</th>
                <th>Дата завантаження</th>
                <th>Завантажити на пк</th>
            </thead>
            <tr>
                <td colspan="4">
                    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data" class="mt-3">
                        @csrf
                        <div class="input-group">
                            <input type="file" class="form-control" name="inputGroupFile04" id="inputGroupFile04">
                            <button type="submit" class="btn btn-primary">Завантажити</button>
                        </div>
                    </form>
                </td>
            </tr>

            @forelse ($files as $file)
                <tr>
                    <td>{{ $file->filename }} </td>
                    <td> {{ $file->filesize }} Kb </td>
                    <td </tr>

                    @empty
            @endforelse

        </table>


    </div>
@endsection
