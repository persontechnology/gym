@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administracion de rutinas
                        <a href="{{route('rutinas')}}">atras</a>
                    </div>

                    <div class="card-body">
                       <form method="POST" action="{{ route('guardarRutina') }}" enctype="multipart/form-data">
                            @csrf
                            
                       
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

                            
                            <!-- dias -->
                            <div class="form-group row">
                                <label for="dias" class="col-md-4 col-form-label text-md-right">Selecione días</label>

                                <div class="col-md-6">
                                    <select multiple class="form-control" id="dias" name="dias[]">
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sabado">Sabado</option>
                                        <option value="Domingo">Domingo</option>
                                      </select>
                                    @if ($errors->has('dias'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('dias') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <!-- hora de inicio-->
                            <div class="form-group row">
                                <label for="horaInicio" class="col-md-4 col-form-label text-md-right">Hora de inicio</label>

                                <div class="col-md-6">
                                    <input id="horaInicio" type="time" class="form-control{{ $errors->has('horaInicio') ? ' is-invalid' : '' }}" name="horaInicio" value="{{ old('horaInicio') }}" required >
                                    @if ($errors->has('horaInicio'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('horaInicio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- hora de fin-->
                            <div class="form-group row">
                                <label for="horaFin" class="col-md-4 col-form-label text-md-right">Hora de fin</label>

                                <div class="col-md-6">
                                    <input id="horaFin" type="time" class="form-control{{ $errors->has('horaFin') ? ' is-invalid' : '' }}" name="horaFin" value="{{ old('horaFin') }}" required >
                                    @if ($errors->has('horaFin'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('horaFin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <!-- descripcion -->

                            <div class="form-group row">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-6">
                                    

                                    <textarea id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion">{{ old('descripcion') }}</textarea>

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
  
  $('#m_rutinas').addClass('active');
</script>
@endsection
