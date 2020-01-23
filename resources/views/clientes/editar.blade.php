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
                    <div class="card-header">Editar cliente
                        <a href="{{route('clientes')}}">atras</a>
                    </div>

                    <div class="card-body">
                       <form method="POST" action="{{ route('actualizarCliente') }}" id="formCliente">
                            @csrf

                            <input type="hidden" name="id" value="{{$cliente->id}}" required="">

                           <!--  <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Alias</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $cliente->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                           <!--  <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div> -->

                            <!-- nombres -->
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombres</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $cliente->nombre }}" required >

                                    @if ($errors->has('nombre'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- apellido -->
                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{ $cliente->apellido }}" required >

                                    @if ($errors->has('apellido'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('apellido') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- cedula -->
                            <div class="form-group row">
                                <label for="cedula" class="col-md-4 col-form-label text-md-right">Cédula</label>

                                <div class="col-md-6">
                                    <input id="cedula" type="number" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ $cliente->cedula }}" required >

                                    @if ($errors->has('cedula'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cedula') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- telefon -->
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">Télefono</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="number" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ $cliente->telefono }}" required >

                                    @if ($errors->has('telefono'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- direccion -->

                            <div class="form-group row">
                                <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección</label>

                                <div class="col-md-6">
                                    

                                    <textarea id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" required>{{$cliente->direccion }}</textarea>

                                    @if ($errors->has('direccion'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('direccion') }}</strong>
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
  $('#m_cliente').addClass('active');

  $( "#formCliente" ).validate( {
    rules: {
        cedula: {
            required: true,
            maxlength:10,
            cedula:true,
        },
        telefono: {
            required: true,
            minlength:6,
            maxlength:15,
            numbersonly:true
        },
        nombre:{
            lettersonly:true
        },
        apellido:{
            lettersonly:true
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
