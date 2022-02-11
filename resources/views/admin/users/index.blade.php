@extends('adminlte::page')

@section('title', 'Lista de usuarios')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    <div class="card">
        @livewire('admin.admin-users')
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@stop
