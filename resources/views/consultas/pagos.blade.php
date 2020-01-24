@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ingresar Información para ver pagos</div>

                    <div class="card-body">
                        
                        <form method="POST" action="{{ route('generarMiPagos') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="cedula" class="col-sm-4 col-form-label text-md-right">Identificación</label>
                                <div class="col-md-6">
                                    <input id="cedula" type="text" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ old('cedula') }}" placeholder="Ingrese identificación" required autofocus>
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
                                        Ingresar
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
    $('#m_mipagos').addClass('active');
    $('#m_consultas').addClass('active');
</script>
@endsection
