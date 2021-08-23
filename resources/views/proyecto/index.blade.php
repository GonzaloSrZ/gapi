@extends('layouts.menu')

@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@stop

@section('title')Proyectos @endsection
  
@section('content')
    
<h4>Lista de Proyectos</h4>

<div class="card">
    <div class="card-body">
     

        <table id="proy"  class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Disciplina</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                <tr>
                    <td>{{$proyecto->id}}</td>
                    <td>{{$proyecto->titulo}}</td>
                    <td>{{$proyecto->disciplina}}</td>
                    <td>{{$proyecto->categoria}}</td>
                    <td>{{$proyecto->fechadeinicio}}</td>
                    <td>{{$proyecto->estado}}</td>
                    <td>
                    @if (auth()->check())
                    <a href="proyectos/crear/{{$proyecto->id}}" class="btn btn-primary">Cargar Publicación</a>
                    @endif
                    <a href="/proyectos/{{$proyecto->id}}" class="btn btn-info">Ver</a>  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

       
    </div>
</div>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script> 
    $('#proy').DataTable({
        responsive: true,
        "lengthMenu": [[5,10,50,-1],[5,10,50,"All"]],
        "language":{
            "info": "_TOTAL_ registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "lengthMenu": 'Mostrar <select>'+
                        '<option value="5">5</option>'+
                        '<option value="10">10</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">Todos</option>'+
                        '</select> registros'
        }
    });
  
</script>
@endsection
