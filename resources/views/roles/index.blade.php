@extends('layouts.layout')

@section('content')
    

    <div class="bg-light p-4 rounded">
        <a href="/folders" class="fs-2 link-dark ">Повернутись назад</a>
        <h3>Налаштування прав доступу</h3>
        <div class="lead">
            <a href="" class="btn btn-primary btn-sm float-right">Додати нову роль</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <thead>
            <th width="1%">№</th>
            <th>Назва</th>
            <th width="3%" colspan="3"></th>
      
          </thead>
      
          <tbody>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="">Edit</a>
                </td>
                <td> 
                </td>
      </tr>
      @endforeach
    </tbody>
  </table>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>

    </div>
@endsection


{{--       
<table class="table table-bordered">
    <thead>
      <th width="1%">№</th>
      <th>Назва</th>
      <th width="3%" colspan="3"></th>

    </thead>

    <tbody>
      @foreach ($roles as $key => $role)
      <tr>
          <td>{{ $role->id }}</td>
          <td>{{ $role->name }}</td>
          <td>
              <a class="btn btn-info btn-sm" href="">Show</a>
          </td>
          <td>
              <a class="btn btn-primary btn-sm" href="">Edit</a>
          </td>
          <td> --}}
              {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
              {!! Form::close() !!} --}}
          {{-- < --}}