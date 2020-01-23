@extends('layouts.app')

@section('content')

<script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/validate/messages_es.min.js') }}"></script>
<script src="{{ asset('js/validate/extras.js') }}"></script>


<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administracion de productos
                        <a href="{{route('productos')}}">atras</a>
                    </div>

                    <div class="card-body">
                       <form method="POST" action="{{ route('actualizarProducto') }}" enctype="multipart/form-data" id="formCliente">
                            @csrf
                            <input type="hidden" name="id" value="{{$producto->id}}">
                            

                            <div class="form-group row">
                                <label for="cat" class="col-md-4 col-form-label text-md-right">Categoria</label>

                                <div class="col-md-6">
                                    <select name="cat" id="cat" class="form-control">
                                        @foreach($categorias as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id==$producto->categoria_id ? 'selected' : ''}}>{{$cat->nombre}}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                            
                            <!-- nombres -->
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $producto->nombre }}" required >

                                    @if ($errors->has('nombre'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- cantidad -->
                            <div class="form-group row">
                                <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad</label>

                                <div class="col-md-6">
                                    <input id="cantidad" type="number" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="{{$producto->cantidad }}" required >

                                    @if ($errors->has('cantidad'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cantidad') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- precio compra -->
                            <div class="form-group row">
                                <label for="precioCompra" class="col-md-4 col-form-label text-md-right">Precio compra</label>

                                <div class="col-md-6">
                                    <input id="precioCompra" type="number" class="form-control{{ $errors->has('precioCompra') ? ' is-invalid' : '' }}" name="precioCompra" value="{{ $producto->precioCompra }}" required >

                                    @if ($errors->has('precioCompra'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('precioCompra') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- precio venta -->
                            
                            
                            <div class="form-group row">
                                <label for="precioVenta" class="col-md-4 col-form-label text-md-right">Precio venta</label>

                                <div class="col-md-6">
                                    <input id="precioVenta" type="number" class="form-control{{ $errors->has('precioVenta') ? ' is-invalid' : '' }}" name="precioVenta" value="{{ $producto->precioVenta }}" required >

                                    @if ($errors->has('precioVenta'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('precioVenta') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- proveedro -->
                            
                            <div class="form-group row">
                                <label for="proveedor" class="col-md-4 col-form-label text-md-right">Proveedor</label>

                                <div class="col-md-6">
                                    <input id="proveedor" type="text" class="form-control{{ $errors->has('proveedor') ? ' is-invalid' : '' }}" name="proveedor" value="{{ $producto->proveedor }}" required >

                                    @if ($errors->has('proveedor'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('proveedor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <!-- foto -->
                            <div class="form-group row">
                                <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>

                                <div class="col-md-6">

                                    @if($producto->foto)
                                        <img src="{{Storage::url('public/images/productos/'.$producto->foto)}}" alt="" width="120px;">
                                    @else
                                    @endif


                                    <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" >

                                    @if ($errors->has('foto'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('foto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- descripcion -->

                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-6">
                                    

                                    <textarea id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion">{{ $producto->descripcion }}</textarea>

                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
  $('#m_registro').addClass('active');
  $('#m_maquina').addClass('active');

  $( "#formCliente" ).validate( {
    rules: {
        
        cantidad:{
            money:true
        },
        precioCompra:{
            money:true
        },
        precioVenta:{
            money:true
        }
    },
    errorElement: "em",
    errorPlacement: function ( error, element ) {
        // Add the `invalid-feedback` class to the error element
        error.addClass( "invalid-feedback" );

        if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.next( "label" ) );
        } else {
            error.insertAfter( element );
        }
    },
    highlight: function ( element, errorClass, validClass ) {
        $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
    },
    unhighlight: function (element, errorClass, validClass) {
        $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
    }
} );
</script>
@endsection
