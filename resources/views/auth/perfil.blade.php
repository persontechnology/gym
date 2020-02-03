@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mi perfil</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('actualizarMiperfil') }}" id="formCliente">
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
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $cliente->email }}" required readonly>

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

                            <div class="form-group row">
                                <label for="tipo_identificacion" class="col-md-4 col-form-label text-md-right">Tipo de identificación<i class="text-danger">*</i></label>
                                <div class="col-md-6">
                                    <select id="tipo_identificacion" class="form-control @error('tipo_identificacion') is-invalid @enderror" name="tipo_identificacion" required>
                                        <option value="Cédula" {{ old('tipo_identificacion',$cliente->tipo_identificacion)=='Cédula'?'selected':'' }}>Cédula</option>
                                        <option value="Ruc persona Natural" {{ old('tipo_identificacion',$cliente->tipo_identificacion)=='Ruc persona Natural'?'selected':'' }}>Ruc persona Natural</option>
                                        <option value="Ruc Sociedad Pública" {{ old('tipo_identificacion',$cliente->tipo_identificacion)=='Ruc Sociedad Pública'?'selected':'' }}>Ruc Sociedad Pública</option>
                                        <option value="Ruc Sociedad Privada" {{ old('tipo_identificacion',$cliente->tipo_identificacion)=='Ruc Sociedad Privada'?'selected':'' }}>Ruc Sociedad Privada</option>
                                        <option value="Pasaporte" {{ old('tipo_identificacion',$cliente->tipo_identificacion)=='Pasaporte'?'selected':'' }}>Pasaporte</option>
                                        <option value="Otros" {{ old('tipo_identificacion',$cliente->tipo_identificacion)=='Otros'?'selected':'' }}>Otros</option>
                                        
                                    </select>
                                    @error('tipo_identificacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="identificacion" class="col-md-4 col-form-label text-md-right">Identificación<i class="text-danger">*</i></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('identificacion') is-invalid @enderror" id="identificacion" name="identificacion" value="{{ old('identificacion',$cliente->identificacion) }}" required placeholder="">
                                    @error('identificacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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

                            <div class="form-group row">
                                <label for="direccion" class="col-md-4 col-form-label text-md-right">Estado</label>

                                <div class="col-md-6">
                                
                                    {{ $cliente->estado==1?'Activo':'Inactivo' }}
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
  $('m_inicio').addClass('active');
</script>
@endsection
