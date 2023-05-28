@extends('layouts.layout')

@section('title', 'File page')
{{-- header пока-шо заглушка --}}
@include('layouts.header')
@section('content')

    {{-- Бордери зроблені для того шоб я бачив де ті колонки вопше є
    я їх пізніше позабираю, а структура така справа будьть показуватись файли і папки 
    а зліва інструменти для роботи з ними це вже зразу адмін панель студентам буде доступна тільки права сторона --}}
    {{-- 27.05 Ой блііін я тіки зараз згадав шо в тебе ж день народження Вітаю)
    короче це пока буде такий робочий кінцевий варіант треба погратись з розміщенням і всією цею хуйньою
    но ладно роблю бек і буду переходити до логін системи --}}
    
        @auth
            <div>
                <h1>Ви авторизовані  </h1>
            </div>
        @endauth

    <div class="row container-lg justify-content-center">

        {{-- left toolbar side  --}}
        <div class="col-5 mt-3">

            <div class="border border-success roundeds">
                <h3 class="mt-3 fs-2 fw-bold text-secondary">Додати новий файл</h3>
                <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data" class="mt-3 w-75">
                    @csrf
                    <div class="input-group">
                        <input type="file" class="form-control mw-100" name="inputGroupFile04" id="inputGroupFile04">
                        <button type="submit" class="btn btn-primary">Додати файл</button>
                    </div>
                </form>

                <h3 class="mt-3 fs-2 fw-bold text-secondary">Додати нову папку</h3>
                <form method="POST" action="{{ route('createfolder') }}" enctype="multipart/form-data" class="mt-3 w-75">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control mw-100" name="foldername" id="inputFoldername">
                        <button type="submit" class="btn btn-primary">Додати папку</button>
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
                {{-- table rows --}}
                @forelse ($folders as $folder)
                    <tr>
                        <td class="w-100">
                            <i class="bx bxs-folder text-secondary fs-3"></i>
                            <a href="/" class="text-decoration-none link-dark">{{ $folder->foldername}}</a>
                        </td>
                        <td><a href="{{ route('deletefolder',['path'=>$folder]) }}" class="btn btn-danger">Видалити</a></td>
                    </tr>
                @empty
                    <td colspan="2">Немає наявних папок</td>
                @endforelse

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
                                <li><a class="dropdown-item link-success"" href="#">Завантажити</a></li>
                                <li><a class="dropdown-item link-danger" href="#">Видалити</a></li>

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

