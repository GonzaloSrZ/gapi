@extends('layouts.menu')

@section('title')Agregar Publicación @endsection
@section('content')
<h4>Cargar Publicación</h4>
    
    <form action="/subproyectos/guardar" method="POST" x-data="data()" class="formcarg">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Titulo</label>
            <input id="titulo" name="titulo" required type="text" tabindex="1" class="form-control" placeholder="Ingrese titulo">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <textarea id="descripcion" name="descripcion" required tabindex="2" class="form-control" placeholder="Ingrese descripción"></textarea>
        </div>
        <div class="mb-3">
            <label  for="" class="form-label">Seleccione cantidad de Autores</label>
            <select x-on:click="isOpen()" x-model="val" class="form-select" name="aut" id="aut">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
            </select>     
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Autor 1</label>
            <input id="autor1" required name="autor1" type="text" tabindex="3" class="form-control" placeholder="Ingrese nombre de autor">
        </div>
        <div x-show="open1" class="mb-3">
            <label for="" class="form-label">Autor 2</label>
            <input id="autor2" name="autor2" type="text" tabindex="4" class="form-control" placeholder="Ingrese nombre de autor">
        </div>
        <div x-show="open2" class="mb-3">
            <label for="" class="form-label">Autor 3</label>
            <input id="autor3" name="autor3" type="text" tabindex="5" class="form-control" placeholder="Ingrese nombre de autor">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Observaciones</label>
            <textarea id="nota" name="nota" tabindex="6" class="form-control" placeholder="Ingrese observación"></textarea>
        </div>
         <div class="mb-3">
{{--             <label for="" class="form-label">Fecha</label>
            <input id="fecha" name="fecha" type="date" class="form-control" tabindex="3"  placeholder="Ingrese fecha">
 --}}            <input type="hidden" value="{{auth()->user()->dni}}" id="dni" name="dni" >
            <input type="hidden" value="{{$subproyecto->id}}" id="idsubp" name="idsubp" >
        </div> 

        <a class="btn btn-secondary" href="/subproyectos" role="button">Cancelar</a>
        <button type="submit" class="btn btn-primary" >Confirmar</button>

    </form>

    <script> 
        function data(){
            return{
                open1: false,
                open2: false,
                val: 1,
                isOpen(){
                    if (this.val==2) {
                        this.open1 = true,
                        this.open2 = false
                    } else if (this.val==3) {
                        this.open1 = true,
                        this.open2 = true
                    } else {
                        this.open1 = false,
                        this.open2 = false
                        
                    } 
                    
                }
            }
      
        }
      </script>
    
@stop
