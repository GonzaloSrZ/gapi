@extends('layouts.menu')

@section('title')Proyecto @endsection
@section('content')
<h4>Ver Proyecto</h4>
    
    <form action="/proyectos/{{$proyecto->id}}" method="GET">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Titulo</label>
            <label id="titulo" name="titulo" type="text" tabindex="1" class="form-control" >{{$proyecto->titulo}}</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Disciplina</label>
            <label id="disciplina" name="disciplina" type="text" tabindex="2" class="form-control" >{{$proyecto->disciplina}}</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Categoría</label>
            <label id="categoria" name="categoria" type="text" tabindex="3" class="form-control" >{{$proyecto->categoria}}</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <label id="descripcion" name="descripcion" type="textarea" tabindex="4" class="form-control"> {{$proyecto->descripcion}}</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripcion breve</label>
            <label id="descripcionbreve" name="descripcionbreve" type="text" tabindex="5" class="form-control" >{{$proyecto->descripcionbreve}}</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha de Inicio</label>
            <label id="fecha" name="fecha" type="text" class="form-control" tabindex="6" >{{$proyecto->fechadeinicio}}</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <label id="estado" name="estado" type="text" tabindex="7" class="form-control" >{{$proyecto->estado}}</label>
        </div>

        <a class="btn btn-secondary" href="/proyectos" role="button" tabindex="8">Volver</a>
         <!-- <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>  -->

    </form>

    
@stop
