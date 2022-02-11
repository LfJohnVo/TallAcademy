@extends('adminlte::page')

@section('title', 'Lista de precios')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.prices.create')}}">Agregar precio</a>
    <h1>Lista de precios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>{{$price->id}}</td>
                            <td>{{$price->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary" href="{{route('admin.prices.edit', $price)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.prices.destroy', $price)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@stop