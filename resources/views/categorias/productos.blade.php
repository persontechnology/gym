@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administracion de productos
                          <a href="{{url('/')}}">atras</a>
                    </div>

                    <div class="card-body">
                       <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>

                              <th scope="col">#</th>
                              <th scope="col">Nombres</th>
                              <th scope="col">Cantidad</th>
                              <!-- <th scope="col">Precio compra</th> -->
                              <th scope="col">Precio Venta</th>
                              <!-- <th scope="col">Proveedor</th> -->
                              <th scope="col">Foto</th>
                              <th scope="col">Descripción</th>
                              <!-- <th scope="col">Categoria</th> -->
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($cat->productos as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->nombre}}</td>
                              <td>{{$cli->cantidad}}</td>
                              <!-- <td>{{$cli->precioCompra}}</td> -->
                              <td>{{$cli->precioVenta}}</td>
                              <!-- <td>{{$cli->proveedor}}</td> -->
                             
                              <td>
                                <img src="{{Storage::url('public/images/productos/'.$cli->foto)}}" alt="" width="120px;">
                              </td>
                              <td>{{$cli->descripcion}}</td>
                              <!-- <td>{{$cli->categoria->nombre or ''}}</td> -->

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
  $('#m_producto').addClass('active');


</script>
@endsection
