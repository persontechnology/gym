@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Nuevo comprobante
                        <a href="{{route('facturas')}}">atras</a>
                    </div>

                    <div class="card-body">
                       @if(Session::has('ventaok'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>{{Session::get('ventaok')['mensajeVentaOk']}}</strong>
                          
                          <a href="{{route('imprimirFacturaVenta',Session::get('ventaok')['idVenta'])}}" target="_blank" class="btn btn-warning btn-lg"><i class="fa fa-print"></i> IMPRIMIR COMPROBANTE </a>

                          <button type="button" class="btn btn-danger btn-lg" data-dismiss="alert" aria-label="Close">
                            Cerrar
                          </button>
                        </div>

                      @endif
                      
                      <div class="row">
                        <div class="col-6">

                          <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Productos</a>
                              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Mensualidad</a>
                            </div>
                          </nav>
                          <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            


                            




                              <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                                <thead>
                                  <tr>

                                    <th scope="col">#</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Cantidad disponible</th>
                                    
                                    <th scope="col">Precio Venta</th>
                                    
                                    <th scope="col">Foto</th>
                                    <th scope="col">Cantidad a vender</th>
                                    <th scope="col">Acción</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @php($i=0)
                                  @foreach($productos as $cli)
                                  @php($i++)
                                  <tr >
                                    <td >{{$i}}</th>
                                    <td id="txtnombre{{$cli->id}}">{{$cli->nombre}}</td>
                                    <td id="txtCantidadSistema{{$cli->id}}">{{$cli->cantidad}}</td>
                                    
                                    <td id="txtprecio{{$cli->id}}">{{$cli->precioVenta}}</td>
                                    
                                   
                                    <td>
                                      @if($cli->foto)
                                      <img src="{{Storage::url('public/images/productos/'.$cli->foto)}}" alt="" width="60px;">
                                      @endif
                                    </td>
                                    <td>
                                      <input type="number" value="" class="form-control form-control-sm" id="txtcantidad{{$cli->id}}" >
                                    </td>

                                      <td>
                                          <button class="btn btn-success btn-sm" type="button" data-cantidad="{{$cli->cantidad}}" data-id="{{$cli->id}}" onclick="cargarProducto(this);">Vender</button>
                                      </td>
                                  </tr>
            
                                  @endforeach
                                 
                                </tbody>
                              </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                              
                              <div class="form-group">
                                <label for="sel1">Ingrese valor del mes:</label>
                                <input type="number" name="totalMes" id="totalMes" value="0" class="form-control">

                              </div>


                              <div class="form-group" id="selectMeses" style="display: none;">
                                <label for="sel1">Selecionar mes:</label>
                                
                                <select class="form-control" id="mespago" name="mespago">
                                  <option value="">Selecione mes de pago</option>
                                  <option value="Enero{{date('Y')}}">Enero {{date('Y')}}</option>
                                  <option value="Febrero{{date('Y')}}">Febrero {{date('Y')}}</option>
                                  <option value="Marzo{{date('Y')}}">Marzo {{date('Y')}}</option>
                                  <option value="Abril{{date('Y')}}">Abril {{date('Y')}}</option>
                                  <option value="Mayo{{date('Y')}}">Mayo {{date('Y')}}</option>
                                  <option value="Junio{{date('Y')}}">Junio {{date('Y')}}</option>
                                  <option value="Julio{{date('Y')}}">Julio {{date('Y')}}</option>
                                  <option value="Agosto{{date('Y')}}">Agosto {{date('Y')}}</option>
                                  <option value="Septiembre{{date('Y')}}">Septiembre {{date('Y')}}</option>
                                  <option value="Octubre{{date('Y')}}">Octubre {{date('Y')}}</option>
                                  <option value="Noviembre{{date('Y')}}">Noviembre {{date('Y')}}</option>
                                  <option value="Diciemre{{date('Y')}}">Diciemre {{date('Y')}}</option>
                                  
                                  
                                </select>

                              </div>



                              
                            </div>
                          </div>
                        
                            

                        </div>
                        <div class="col-6">
                          <form action="{{route('finalizarFactura')}}" method="post" id="procesarVenta">
                              @csrf
                            <div class="form-group row">
                                

                                <div class="col-md-6">
                                  <label for="cliente" class="col-md-12 col-form-label">Selecion Cliente</label>
                                  <select name="cliente" id="cliente" class="form-control" required="">
                                    <option value=""></option>
                                    @foreach($clientes as $clie)
                                    <option value="{{$clie->id}}">{{$clie->nombre}} {{$clie->apellido}} - {{$clie->identificacion}}</option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="col-md-6">
                                  <label for="numeroFactura" class="col-md-12 col-form-label">Número de comprobante</label>
                                  <input type="number" class="form-control form-control-sm" name="numeroFactura" id="numeroFactura" placeholder="Ingrese #" required="">
                                </div>
                              </div>

                            <!-- detalle factura -->
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio U.</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody id="detalleFactura">
                                  
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td colspan="5">Total</td>
                                    <td><b id="totalVenta">$ 00</b></td>
                                  </tr>
                                </tfoot>
                              </table>
                              </div>
                            <!-- fin detalle factura -->
                            <div id="acciones">
                              <a href="{{route('facturas')}}" class="btn btn-danger btn-lg pull-right">Cancelar venta</a>
                              <button class="btn btn-info btn-lg pull-right" type="submit">Finalizar venta</button>
                            </div>
                            

                          </form>
                        </div>
                      </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
  $('#m_mensual').addClass('active');
  $('#m_factura').addClass('active');
  
  $('#cliente').select2();





total=0;

$('#procesarVenta').validate({
  messages:{
    numeroFactura:{
      required:'Ingrese # de factura'
    },
    cliente:{
      required:'Selecione cliente'
    }
  },
  errorElement: "em",
  submitHandler:function(form){
    

    alertify.confirm("ESTA SEGURO DE FINALIZAR LA VENTA.","TOTAL VENTA: $ "+total.toFixed(2)+"<br>"+"CLIENTE: "+$('#cliente :selected').text(),
    function(){
      form.submit();
    },
    function(){
      alertify.error('Cancelado');
    });

  }
});

$('#procesarVenta').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

$('#cliente').on('select2:select', function (e) {
    var idCliente = e.params.data.id;
    
    // para info de pagos $.get

      $.get( "{{route('obtenerPagos')}}", { id: idCliente} )
        .done(function( data ) {

          $("#mespago > option").each(function() {
                
                $('#mespago option[value="'+this.value+'"]').attr("disabled", false);
            });

           data.res.forEach( function(element, index) {
             var mes=element.fecha;
             var res = mes.split(" ");
             var mesexiste=res[0]+res[1];

             if ($('#'+mesexiste)) {
              $('#mespago option[value="'+mesexiste+'"]').attr("disabled", true);
             }

           });

        }).fail(function() {
          alert( "error" );
        });


      $('#selectMeses').show();
      $(this).valid(); 
  });



function cargarProducto(argument) {
  var id=$(argument).data('id');

  cantidadSistema=parseInt($('#txtCantidadSistema'+id).text());
  cantidad=$('#txtcantidad'+id).val();

  if (cantidad>0 && cantidad<=cantidadSistema) {
    
    if ($('#fila'+id).length) {
      alert('Ya existe');
    }else{
      var nombre=$('#txtnombre'+id).text();
      precio =parseFloat($('#txtprecio'+id).text());

      var fila='<tr id="fila'+id+'">'+
        '<th class="contadorAux"></th>'+
        '<td> <input type="hidden" name="idproductosventa[]" value="'+id+'" required />'+nombre+'</td>'+
        '<td> <input type="hidden" name="cantidadesventa[]" value="'+cantidad+'" required />'+cantidad+'</td>'+
        '<td>'+precio.toFixed(2)+'</td>'+
        '<td class="subtotal">'+(cantidad*precio).toFixed(2)+'</td>'+
        '<td><button class="btn btn-xs btn-danger" type="button" data-id="'+id+'" onclick="quitarProducto(this);">x</button></td>'+
      '</tr>';

      $('#detalleFactura').append(fila);  

      crearContador();
    }
    

  }else {
    alert('Cantidad a vender incorrecto');
  }
}

$('#mespago').on('change', function (e) {
    
    mespago=$(this).val();
    valorPago=parseFloat($('#totalMes').val());
    descripcion=$('#mespago option:selected').html();

    if (valorPago>0) {

      if ($('#fila'+mespago).length) {
        alert('Ya existe');
      }else{

        var fila='<tr id="fila'+mespago+'">'+
          '<th class="contadorAux"></th>'+
          '<td> <input type="hidden" name="idproductosventa[]" value="pago" required />Pago mes: '+descripcion+'</td>'+
          '<td> <input type="hidden" name="cantidadesventa[]" value="'+descripcion+'" required />'+1+'</td>'+
          '<td><input type="hidden" name="preciopagos[]" value="'+valorPago.toFixed(2)+'" />'+valorPago.toFixed(2)+'</td>'+
          '<td class="subtotal">'+(1*valorPago).toFixed(2)+'</td>'+
          '<td><button class="btn btn-xs btn-danger" type="button" data-id="'+mespago+'" onclick="quitarProducto(this);">x</button></td>'+
        '</tr>';

        $('#detalleFactura').append(fila);  

        crearContador();
      }

    }else{
      alert('Valor de mes incorrecto.');
      $('#mespago').val("");
    }

  
});



function crearContador(){
  total=0;
  $('#detalleFactura .contadorAux').each(function(index, el) {
        $(this).html(index+1);
  });
  $('#detalleFactura .subtotal').each(function(index, el) {

        total+=parseFloat($(this).html());
  });

  $('#totalVenta').html(total.toFixed(2));

  if (total>0) {
    $('#acciones').show();
  }else{
    $('#acciones').hide();
  }
  
}

function quitarProducto(argument){
  $('#fila'+$(argument).data('id')).remove();
  crearContador();
}
crearContador();
</script>
@endsection
