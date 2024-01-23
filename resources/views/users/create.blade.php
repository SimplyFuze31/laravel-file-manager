@extends('layouts.layout')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Додати нового користувача</h1>
        <div class="lead">
            
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{route('users.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">П.І.Б</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Введіть прізвище, ім'я, по батькові" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email') }}"
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Введіть email" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="pasword" class="form-label">Пароль</label>
                    <input value="{{ old('username') }}"
                        type="password" 
                        class="form-control" 
                        name="password" 
                        placeholder="Введіть пароль" required>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="role-select">Роль</label>
                    <select class="form-select" name="role-select" id="role-select">
                        @foreach ($roles as $role)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Зберегти користувача</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Назад</a>
            </form>
        </div>

    </div>
@endsection