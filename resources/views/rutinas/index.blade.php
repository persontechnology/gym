@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administracion de rutinas
                        <a href="{{route('nuevoRutina')}}">Nueva rutinas</a>
                    </div>

                    <div class="card-body">
                       <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>

                              <th scope="col">#</th>
                              <th scope="col">Nombre</th>
                              <th scope="col">Descripción</th>
                              <th scope="col">Hora de incio</th>
                              <th scope="col">hora de finalización</th>
                              <th scope="col">Días</th>
                              <th scope="col">Estado</th>
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($rutinas as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->nombre}}</td>
                              <td>{{$cli->descripcion}}</td>
                              <td>{{$cli->inicio}}</td>
                              <td>{{$cli->fin}}</td>
                                <td>
                                   @foreach ($cli->dias as $dia)
                                       {{ $dia }},
                                   @endforeach
                                    
                                </td>                              

                                <td>
                                    
                                    @if ($cli->estado)
                                        <span class="badge badge-success">Activo</span>
                                    @else
                                        <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                    
                                </td>
                                <td>
                                    <a href="{{ route('reservas',$cli->id) }}" class="btn btn-warning">Reservas</a>
                                    <a href="{{ route('rutinaEditar',$cli->id) }}" class="btn btn-info">Editar</a>
                                    <button class="btn btn-danger" type="button" onclick="eliminar(this);" data-url="{{ route('eliminarRutina',$cli->id) }}" >Eliminar</button>
                                </td>
                            </tr>
      
                            @endforeach
                           
                          </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
  
  $('#m_rutinas').addClass('active');


  function eliminar(argument) {
    alertify.confirm("ESTA SEGURO DE ELIMINAR.","Se perdera toda la información",
    function(){
      window.location=$(argument).data('url');
    },
    function(){
      alertify.error('Cancelado');
    });
  }
</script>
@endsection
