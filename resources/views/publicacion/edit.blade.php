@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar publicacion</h1>
@stop

@section('content')
    <p></p>
    
    <form action="/publicaciones/{{$publicacion->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Titulo</label>
            <input id="titulo" name="titulo" type="text" value="{{$publicacion->titulo}}" tabindex="1" class="form-control" placeholder="Ingrese titulo">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <textarea id="descripcion" name="descripcion" value="{{$publicacion->descripcion}}" tabindex="2" class="form-control" placeholder="Ingrese descripcion"></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input id="fecha" name="fecha" type="date" value="{{$publicacion->fecha}}" class="form-control" tabindex="3"  placeholder="Ingrese fecha">
            <input type="hidden" value="{{auth()->user()->dni}}" id="dni" name="dni" >
        </div>

        <a class="btn btn-secondary" href="/publicaciones" role="button" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>

    </form>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop