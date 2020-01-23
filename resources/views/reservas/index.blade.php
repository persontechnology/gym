@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administracion de reservas
                        <a href="{{route('rutinas')}}">atras</a>
                    </div>

                    <div class="card-body">
                       <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Cédula</th>
                              <th scope="col">Nombres</th>
                              <th scope="col">Apellidos</th>
                              <th scope="col">Télefono</th>
                              <th scope="col">Email</th>
                              <th scope="col">Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($reservas as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->cedula}}</td>  
                              <td>{{$cli->nombre}}</td>
                              <td>{{$cli->apellido}}</td>
                              <td>{{$cli->telefono}}</td>
                                <td>{{$cli->email}}</td>
                                <td>
                                  <button class="btn btn-danger" type="button" onclick="eliminar(this);" data-url="{{route('eliminarReserva',$cli->reservas->id)}}" >Eliminar</button>
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
