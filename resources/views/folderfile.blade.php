@extends('layouts.layout')

@section('title', 'File page')

@section('content')
    
<table class="table table-hover caption-top">
    <caption class="fs-2 fw-bold">Файли</caption>
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
@endsection
