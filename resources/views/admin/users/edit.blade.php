@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h5">Nombre: </h1>
            <p class="form-control">{{ $user->name }}</p>

            <h1 class="h5">Lista de roles</h1>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

            @foreach ($roles as $role)
                <div>
                    <label>
                        {{ Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) }}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary shadow-lg']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@stop
