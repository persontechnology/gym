@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dietas
                        <a href="{{route('nuevoDieta')}}" class="btn btn-info">Nueva dieta</a>
                    </div>

                    <div class="card-body">
                        <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Fecha ingreso</th>
                              <th scope="col">Título</th>
                              <th scope="col">Peso</th>
                              <th scope="col">Altura</th>
                              <th scope="col">Masa corporal</th>
                              
                              <th scope="col">Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($dietas as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->created_at}}</td>
                              <td>{{$cli->titulo}}</td>
                              <td>{{$cli->peso}}</td>
                              <td>{{$cli->altura}}</td>
                              <td>
                                {{$cli->altura*$cli->peso}}
                              </td>
                              

                                <td>
                                    <a href="{{route('dietasEditar',$cli->id)}}" class="btn btn-info">Editar</a>
                                    <button class="btn btn-danger" type="button" onclick="eliminar(this);" data-url="{{route('dietasEliminar',$cli->id)}}">Eliminar</button>
                                    <a href="{{route('historialDieta',$cli->id)}}" class="btn btn-warning">Historial</a>
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
  $('#m_dietas').addClass('active');
  $('#m_asignar_dieta').addClass('active');
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
