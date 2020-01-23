@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar rutinas
                        <a href="{{route('rutinas')}}">atras</a>
                    </div>

                    <div class="card-body">
                       <form method="POST" action="{{ route('actualizarRutina') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $rutina->id }}" required>
                       
                            <!-- nombres -->
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre',$rutina->nombre) }}" required >

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
                                        <option value="Lunes" {{ in_array('Lunes',$rutina->dias)?'selected':'' }} >Lunes</option>
                                        <option value="Martes" {{ in_array('Martes',$rutina->dias)?'selected':'' }}>Martes</option>
                                        <option value="Miercoles" {{ in_array('Miercoles',$rutina->dias)?'selected':'' }}>Miercoles</option>
                                        <option value="Jueves" {{ in_array('Jueves',$rutina->dias)?'selected':'' }}>Jueves</option>
                                        <option value="Viernes" {{ in_array('Viernes',$rutina->dias)?'selected':'' }}>Viernes</option>
                                        <option value="Sabado" {{ in_array('Sabado',$rutina->dias)?'selected':'' }}>Sabado</option>
                                        <option value="Domingo" {{ in_array('Domingo',$rutina->dias)?'selected':'' }}>Domingo</option>
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
                                    <input id="horaInicio" type="time" class="form-control{{ $errors->has('horaInicio') ? ' is-invalid' : '' }}" name="horaInicio" value="{{ old('horaInicio',$rutina->inicio) }}" required >
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
                                    <input id="horaFin" type="time" class="form-control{{ $errors->has('horaFin') ? ' is-invalid' : '' }}" name="horaFin" value="{{ old('horaFin',$rutina->fin) }}" required >
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
                                    

                                    <textarea id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion">{{ old('descripcion',$rutina->descripcion) }}</textarea>

                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>

                                    <div class="col-md-6">
                                        <select class="form-control" id="estado" name="estado">
                                            <option value="1" {{ $rutina->estado==true?'selected':'' }} >Activo</option>
                                            <option value="0" {{ $rutina->estado==false?'selected':'' }}>Inactivo</option>
                                        </select>
                                        @if ($errors->has('estado'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('estado') }}</strong>
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
  
  $('#m_rutinas').addClass('active');
</script>
@endsection
