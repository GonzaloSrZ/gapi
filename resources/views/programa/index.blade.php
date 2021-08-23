@extends('layouts.menu')

@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@stop

@section('title')Programas @endsection
 

@section('content')   
<h4>Lista de Programas</h4>

<div class="card">
    <div class="card-body">
        <table id="prog" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Disciplina</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programas as $programa)
                <tr>
                    <td>{{$programa->id}}</td>
                    <td>{{$programa->titulo}}</td>
                    <td>{{$programa->disciplina}}</td>
                    <td>{{$programa->categoria}}</td>
                    <td>{{$programa->fechadeinicio}}</td>
                    <td>{{$programa->estado}}</td>
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

    <script> $(document).ready(function() {
        $('#prog').DataTable({
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
    } );
    </script>

    @endsection


