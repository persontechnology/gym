@extends('layouts.app')

@section('content')
<script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/validate/messages_es.min.js') }}"></script>
<script src="{{ asset('js/validate/extras.js') }}"></script>

<script type="text/javascript" src="{{asset('/extras/ckeditor/ckeditor.js')}}"></script>
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administracion de dietas
                        <a href="{{route('dietas')}}">atras</a>
                    </div>

                    <div class="card-body">
                       <form method="POST" action="{{ route('guardarDieta') }}" enctype="multipart/form-data" id="formCliente">
                            @csrf


                            <!-- nombres -->
                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo</label>

                                <div class="col-md-6">
                                    <input id="titulo" type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{ old('titulo') }}" required >

                                    @if ($errors->has('titulo'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- cantidad -->
                            <div class="form-group row">
                                <label for="peso" class="col-md-4 col-form-label text-md-right">Peso</label>

                                <div class="col-md-6">
                                    <input id="peso" type="text" class="form-control{{ $errors->has('peso') ? ' is-invalid' : '' }}" name="peso" value="{{ old('peso') }}" required >

                                    @if ($errors->has('peso'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('peso') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- marca -->
                            <div class="form-group row">
                                <label for="altura" class="col-md-4 col-form-label text-md-right">Altura</label>

                                <div class="col-md-6">
                                    <input id="altura" type="text" class="form-control{{ $errors->has('altura') ? ' is-invalid' : '' }}" name="altura" value="{{ old('altura') }}" required >

                                    @if ($errors->has('altura'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('altura') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        
                            <!-- direccion -->

                            <div class="form-group row">
                                <label for="detalle" class="col-md-12 col-form-label">Recomendaciones</label>
                                <div class="col-md-12">
                                    <textarea id="detalle" type="text" class="form-control{{ $errors->has('detalle') ? ' is-invalid' : '' }}" name="detalle">{{ old('detalle') }}</textarea>
                                    @if ($errors->has('detalle'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('detalle') }}</strong>
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
    $('#m_dietas').addClass('active');
    $('#m_asignar_dieta').addClass('active');
   CKEDITOR.replace( 'detalle' );


   $( "#formCliente" ).validate( {
    rules: {
        
        peso:{
            money:true
        },
        altura:{
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
