@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Comprobantes de pago
                        <a href="{{route('nuevoFactura')}}">Nuevo comprobante de pago </a>
                    </div>

                    <div class="card-body">
                       <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>
                              
  
                              <th scope="col">#</th>
                              <th scope="col">Factura</th>
                              <th scope="col">Estado</th>
                              <th scope="col">Total</th>
                              <th scope="col">Cliente</th>
                              <th scope="col">Identificación</th>
                              <th scope="col">Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($facturas as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->factura}}</td>
                              <td>
                                @if($cli->estado)
                                  Activo
                                @else
                                  Anulado
                                @endif
                              </td>
                              <td>{{$cli->total}}</td>
                              <td>{{$cli->cliente->nombre}} {{$cli->cliente->apellido}} </td>
                              <td>
                                  {{ $cli->cliente->identificacion }}
                              </td>

                                <td>
                                    <a href="{{route('imprimirFacturaVenta',$cli->id)}}" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i>Imprimir</a>
                                    
                                    <button class="btn btn-danger" type="button" onclick="eliminar(this);" data-url="{{route('eliminarFactura',$cli->id)}}" >Eliminar</button>

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
