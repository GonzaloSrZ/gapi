@extends('layouts.menu')

@section('title')Publicación @endsection

@section('content')
<h4>Ver Publicación</h4>
    
    <form action="/publicaciones/{{$publicacion->id}}" method="GET">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Titulo</label>
            <label id="titulo" name="titulo" type="text" tabindex="1" class="form-control" >{{$publicacion->titulo}}</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <label id="descripcion" name="descripcion" type="textarea" tabindex="2" class="form-control"> {{$publicacion->descripcion}}</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <label id="fecha" name="fecha" type="text" class="form-control" tabindex="3" >{{$publicacion->fechadepublicacion}}</label>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Autor 1</label>
            <label id="autor1" name="autor1" type="text" tabindex="4" class="form-control" >{{$publicacion->autor1}}</label>
        </div>

        @if ($publicacion->autor2!='')
            
        <div class="mb-3">
            <label for="" class="form-label">Autor 2</label>
            <label id="autor2" name="autor2" type="text" tabindex="4" class="form-control" >{{$publicacion->autor2}}</label>
        </div>
        @endif

        @if ($publicacion->autor3!='')    
        <div class="mb-3">
            <label for="" class="form-label">Autor 3</label>
            <label id="autor3" name="autor3" type="text" tabindex="4" class="form-control" >{{$publicacion->autor3}}</label>
        </div>
        @endif

        
        @if ($publicacion->nota!='')
        <div class="mb-3">
            <label for="" class="form-label">Observación</label>
            <label id="descripcion" name="descripcion" type="textarea" tabindex="2" class="form-control"> {{$publicacion->nota}}</label>
        </div>
        @endif
            
        @if ($publicacion->subproyecto_id=='')
        <div class="mb-3">
            <label for="" class="form-label">Titulo de Proyecto</label>
            <label id="titulo" name="titulo" type="text" tabindex="4" class="form-control" >{{$publicacion->proyecto_id}}</label>
        </div>
        @else
        <div class="mb-3">
            <label for="" class="form-label">Titulo de Subproyecto</label>
            <label id="titulo" name="titulo" type="text" tabindex="4" class="form-control" >{{$publicacion->subproyecto_id}}</label>
        </div>
        @endif
        <a class="btn btn-secondary" href="/publicaciones" role="button" tabindex="5">Volver</a>
         <!-- <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>  -->

    </form>

    
@stop

