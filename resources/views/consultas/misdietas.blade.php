@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Mi dietas
                        <a href="{{route('midietaConsulta')}}" class="btn btn-danger">Salir</a>
                    </div>

                    <div class="card-body">
                        <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Fecha</th>
                              <th scope="col">Peso</th>
                              <th scope="col">Altura</th>
                              <th scope="col">Masa corporal (peso/altura <sup>2</sup> )</th>
                              <th>Descripción</th>
                              <th>Dieta</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($dietas as $die)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$die->created_at}}</td>
                              <td>{{$die->peso}}</td>
                              <td>{{$die->altura}}</td>
                              <td>{{$die->peso/pow($die->altura,2)}}</td>
                              <td>{!!$die->dieta->detalle!!}</td>
                              <td>{{$die->dieta->titulo}}</td>
                            </tr>
      
                            @endforeach
                           
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $('#m_midieta').addClass('active');
    $('#m_consultas').addClass('active');
</script>
@endsection
