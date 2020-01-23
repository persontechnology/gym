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
                    <div class="card-header">Administracion de maquinas
                        <a href="{{route('maquinas')}}">atras</a>
                    </div>

                    <div class="card-body">
                       <form method="POST" action="{{ route('registrarMaquina') }}" enctype="multipart/form-data" id="formCliente">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="cat" class="col-md-4 col-form-label text-md-right">Categoria</label>

                                <div class="col-md-6">
                                    <select name="cat" id="cat" class="form-control">
                                        @foreach($categorias as $cat)
                                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <!-- nombres -->
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required >

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
                                    <input id="cantidad" type="number" class="form-control{{ $errors->has('apecantidadllido') ? ' is-invalid' : '' }}" name="cantidad" value="{{ old('cantidad') }}" required >

                                    @if ($errors->has('cantidad'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cantidad') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- marca -->
                            <div class="form-group row">
                                <label for="marca" class="col-md-4 col-form-label text-md-right">Marca</label>

                                <div class="col-md-6">
                                    <input id="marca" type="text" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" name="marca" value="{{ old('marca') }}" required >

                                    @if ($errors->has('marca'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('marca') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- estado -->
                            <div class="form-group row">
                                <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>

                                <div class="col-md-6">
                                    <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" >

                                    @if ($errors->has('foto'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('foto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- direccion -->

                            <div class="form-group row">
                                <label for="observacion" class="col-md-4 col-form-label text-md-right">Observación</label>

                                <div class="col-md-6">
                                    

                                    <textarea id="observacion" type="text" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" name="observacion">{{ old('observacion') }}</textarea>

                                    @if ($errors->has('observacion'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('observacion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
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
