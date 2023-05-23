@extends('layouts')

@section('content')
    <div class="container">
        <nav>

        </nav>
        <h1>Файли</h1>
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="searchinput" id="searchinput">
                <button type="submit" class="btn btn-primary">Шукати</button>
            </div>
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
                <td>{{$file->filename}} </td>
                <td> {{$file->filesize}} Kb </td>
                <td
            </tr>
                
            @empty
                
            @endforelse

        </table>


    </div>
@endsection
