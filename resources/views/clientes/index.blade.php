@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administración de clientes
                        <a href="{{route('nuevoCliente')}}">Nuevo cliente</a>
                    </div>

                    <div class="card-body">
                       <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Tipo de identificación</th>
                              <th scope="col">Identificación</th>
                              <th scope="col">Nombres</th>
                              <th scope="col">Apellidos</th>
                              <th scope="col">Teléfono</th>
                              <th scope="col">Email</th>
                              <th scope="col">Estado</th>
                              <th scope="col">Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($clientes as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->tipo_identificacion}}</td>  
                              <td>{{$cli->identificacion}}</td>  
                              <td>{{$cli->nombre}}</td>
                              <td>{{$cli->apellido}}</td>
                              <td>{{$cli->telefono}}</td>
                              <td>{{$cli->email}}</td>
                              <td>
                                @if ($cli->estado)
                                  <span class="badge badge-success">Activo</span>
                                @else
                                <span class="badge badge-warning">Inactivo</span>  
                                @endif
                              </td>
                                <td>

                                  <!-- cambiar color de boton usd, tiene que revisar boottrap 4-->
                                  
                                    <a href="{{route('editarCliente',$cli->id)}}" class="btn btn-info">Editar</a>
                                    <button class="btn btn-danger" type="button" onclick="eliminar(this);" data-url="{{route('eliminarCliente',$cli->id)}}" >Eliminar</button>

                                    <a href="{{route('pagos',$cli->id)}}" class="btn btn-warning">Pagos</a>
                                    <a href="{{route('dietasClienteHistorial',$cli->id)}}" class="btn btn-success">Dietas</a>
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
  $('#m_registro').addClass('active');
  $('#m_cliente').addClass('active');


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
