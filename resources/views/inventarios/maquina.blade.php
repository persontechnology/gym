@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                      <form action="{{route('crearInventarioMaquinas')}}" method="post">
                         @csrf
                         <h2>Cantidad:actual {{$maquina->cantidad}}</h2>
                         <input type="hidden" name="id" value="{{$maquina->id}}">
                         <div class="col-md-12">
                          <label for="cantidad" class="col-md-12 col-form-label">Ingrese cantidad existente</label>
                          <input type="text" class="form-control form-control-sm" name="cantidad" id="cantidad" placeholder="Ingrese #" required="">
                          <button class="btn btn-info">Guardar</button>
                        </div>
                        
                          
                        
                      </form>
                    </div>

                    <div class="card-body">
                       <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>
                              
  
                              <th scope="col">#</th>
                              <th scope="col">Fecha</th>
                              <th scope="col">Cantidad sistema</th>
                              <th scope="col">Cantidad ingresado</th>
                              <!-- <th scope="col">Cliente</th> -->
                              <th scope="col">Mensaje</th>
                              <th scope="col">Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($maquina->inventarios as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->created_at}}</td>
                              <td>
                                {{$cli->cantidadExistente}}
                              </td>
                              
                              <td>{{$cli->cantidadActual}} </td>

                                <td>
                                  @if($cli->cantidadExistente==$cli->cantidadActual)
                                    Exacto
                                  @endif
                                  

                                  @if($cli->cantidadExistente>$cli->cantidadActual)
                                    FALTA {{$cli->cantidadExistente-$cli->cantidadActual}}
                                  @endif

                                  @if($cli->cantidadExistente<$cli->cantidadActual)
                                    SOBRA {{$cli->cantidadActual-$cli->cantidadExistente}}
                                  @endif

                                </td>
                                <td>
                                  <button class="btn btn-danger btn-sm" onclick="eliminar(this);" data-url="{{route('eliminarInventarioMaquinas',$cli->id)}}">Eliminar</button>
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
  $('#m_mensual').addClass('active');
  $('#m_factura').addClass('active');
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
