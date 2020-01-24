@extends('layouts.app')

@section('content')
<script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/validate/messages_es.min.js') }}"></script>
<script src="{{ asset('js/validate/extras.js') }}"></script>

<div class="sec-spacer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ingresar Información para generar asistencia</div>

                    <div class="card-body">
                        <h2>Fecha de asistencia <b>{{ \Carbon\Carbon::now()}}</b></h2>
                        <form method="POST" action="{{ route('generarMiAsistencia') }}" id="formCliente">
                            @csrf

                            <div class="form-group row">
                                <label for="cedula" class="col-sm-4 col-form-label text-md-right">Identificación</label>
                                <div class="col-md-6">
                                    <input id="cedula" type="number" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ old('cedula') }}" placeholder="Ingrese identificación" required autofocus>

                                    @if ($errors->has('cedula'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cedula') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Generar
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
<script type="text/javascript">
    $('#m_miasistencia').addClass('active');
    $('#m_consultas').addClass('active');
    $( "#formCliente" ).validate( {
        rules: {
            cedula: {
                required: false,
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
