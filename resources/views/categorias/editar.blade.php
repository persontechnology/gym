@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administracion de categorias
                        <a href="{{route('categorias')}}">atras</a>
                    </div>

                    <div class="card-body">
                       <form method="POST" action="{{ route('actualizarCategoria') }}" enctype="multipart/form-data">
                            @csrf

                        <input type="hidden" name="id" value="{{$cat->id}}">
                            <!-- nombres -->
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $cat->nombre }}" required >

                                    @if ($errors->has('nombre'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="observacion" class="col-md-4 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-6">
                                    

                                    <textarea id="observacion" type="text" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" name="observacion">{{ $cat->descripcion }}</textarea>

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
  $('#m_categoria').addClass('active');
</script>
@endsection
