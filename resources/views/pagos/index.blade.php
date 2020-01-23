@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administracion de pagos
                        <a href="{{route('clientes')}}">atras</a>
                        
                      <!--   <div class="alert alert-danger" role="alert">
                          <strong>Ingresar nuevo pago</strong>
                  
                          <form action="{{ route('registrarPago') }}" enctype="multipart/form-data" method="post">
                            
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}" required="">
                            
            
                            <div class="form-group row">
                                  <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha</label>

                                  <div class="col-md-6">
                                      <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{ old('fecha') }}" required >

                                      @if ($errors->has('fecha'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('fecha') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="valor" class="col-md-4 col-form-label text-md-right">Valor</label>

                                  <div class="col-md-6">
                                      <input id="valor" type="text" class="form-control{{ $errors->has('valor') ? ' is-invalid' : '' }}" name="valor" value="{{ old('valor') }}" required >

                                      @if ($errors->has('valor'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('valor') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                                   
                              <button type="submit" class="btn btn-info">Guardar</button>
                      

                          </form>
                        </div> -->
                    </div>

                    <div class="card-body">
                       <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Valor</th>
                              <th scope="col">Fecha pago</th>
                              <th scope="col">Mes pago</th>
                              <th scope="col">Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($clientes as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->valor}}</td>
                              <td>{{$cli->created_at}}</td>
                              <td>{{$cli->fecha}}</td>
                              
                                <td>
                                    
                                    <button class="btn btn-danger" type="button" onclick="eliminar(this);" data-url="{{route('eliminarPago',$cli->id)}}" >Eliminar</button>
                                    <a href="{{route('imprimirPago',$cli->id)}}" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Imprimir</a>

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
