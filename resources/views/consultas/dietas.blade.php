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
                    <div class="card-header">Ingresar Información para ver dietas
                      
                    <div class="card-body">
                        <form method="POST" action="{{ route('generarMiDietas') }}" id="formCliente">
                            @csrf

                            <div class="form-group row">
                                <label for="cedula" class="col-sm-4 col-form-label text-md-right">Identificación</label>
                                <div class="col-md-6">
                                    <input id="cedula" type="number" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ $cliente->cedula ?? '' }}" placeholder="Ingrese identificación" required autofocus>
                                    @if ($errors->has('cedula'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cedula') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="peso" class="col-sm-4 col-form-label text-md-right">Peso</label>
                                <div class="col-md-6">
                                    <input id="peso" type="number" class="form-control{{ $errors->has('peso') ? ' is-invalid' : '' }}" name="peso" value="{{ old('peso') }}" placeholder="Ingrese peso" required autofocus>
                                    @if ($errors->has('peso'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('peso') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="altura" class="col-sm-4 col-form-label text-md-right">Altura</label>
                                <div class="col-md-6">
                                    <input id="altura" type="number" class="form-control{{ $errors->has('altura') ? ' is-invalid' : '' }}" name="altura" value="{{ old('altura') }}" placeholder="Ingrese altura" required autofocus>
                                    @if ($errors->has('altura'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('altura') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ingresar
                                    </button>
                                </div>
                            </div>

                            @if($recomendado=="si")
                                <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Fecha ingreso</th>
                                      <th scope="col">Titulo</th>
                                      <th scope="col">Peso</th>
                                      <th scope="col">Altura</th>
                                      <th scope="col">Masa corporal</th>
                                      
                                      <th scope="col">Acción</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php($i=0)
                                    @foreach($dietas as $cli)
                                    @php($i++)
                                    <tr >
                                      <td >{{$i}}</th>
                                      <td>{{$cli->created_at}}</td>
                                      <td>{{$cli->titulo}}</td>
                                      <td>{{$cli->peso}}</td>
                                      <td>{{$cli->altura}}</td>
                                      <td>
                                        {{$cli->altura*$cli->peso}}
                                      </td>
                                      

                                        <td>
                                            <a href="{{route('generarDietaCliente',[$cliente,$cli->id])}}" class="btn btn-info">Generar dieta</a>
                                        </td>
                                    </tr>
              
                                    @endforeach
                                   
                                  </tbody>
                                </table>
                            @endif
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $('#m_midieta').addClass('active');
    $('#m_consultas').addClass('active');
    $( "#formCliente" ).validate( {
        rules: {
            cedula: {
                required: false,
            },
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
