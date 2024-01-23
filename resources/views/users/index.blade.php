@extends('layouts.layout')

@section('content')
    

<div class="container">
    <a class="fs-3 m-3" href="{{route('folder.index')}}">Повернутись назад</a>

    <div class="bg-light p-4 rounded">
        <h1>Користувачі</h1>
        <div class="lead">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Додати нового користувача</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
    <table class="table table-striped">
    <thead>
    <tr>
        <th scope="col" width="1%">#</th>
        <th scope="col" width="15%">П.І.Б</th>
        <th scope="col">Email</th>
        <th scope="col" width="10%">Роль</th>
        <th scope="col" width="1%" colspan="3"></th>    
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->roles as $role)
                        <span class="badge bg-primary">{{ $role->name }}</span>
                    @endforeach
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Видалити', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
        

        {{-- <div class="d-flex">
            {!! $users->links() !!}
        </div> --}}

    </div>
@endsection