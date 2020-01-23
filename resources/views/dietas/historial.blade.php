@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dietas
                        <a href="{{route('dietas')}}" class="btn btn-info">atras</a>
                    </div>

                    <div class="card-body">
                        <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Fecha ingreso</th>
                              <th scope="col">Titulo</th>
                              <th scope="col">Peso</th>
                              <th scope="col">Altura</th>
                              <th scope="col">Masa corporal (peso/altura <sup>2</sup> )</th>
                              <th>Cliente</th>
                              <th scope="col">Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($dieta->historial as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->created_at}}</td>
                              <td>p</td>
                              <td>{{$cli->peso}}</td>
                              <td>{{$cli->altura}}</td>
                              <td>{{$cli->peso/pow($cli->altura,2)}}</td>
                              
                              <td>
                                {{$cli->cliente->cedula}}
                                {{$cli->cliente->nombre}} {{$cli->cliente->apellido}}
                              </td>
                                <td>
                                    <button class="btn btn-danger" type="button" onclick="eliminar(this);" data-url="{{route('dietasEliminarHistorial',$cli->id)}}">Eliminar</button>
                                    
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
  $('m_inicio').addClass('active');
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
