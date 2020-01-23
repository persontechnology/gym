@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mi asistencia
                        <a href="{{url('salir-de-mi-asistecia')}}" class="btn btn-danger">Salir</a>
                    </div>

                    <div class="card-body">
                        <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Fecha</th>
                              <th scope="col">Asistencia</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($cliente->lista as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->created_at}}</td>
                              <td>
                                    @if($cli->estado)
                                            <span class="badge badge-success">SI</span>
                                    @else
                                            <span class="badge badge-danger">No</span>
                                    @endif

                              </td>
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
  $('#m_miasistencia').addClass('active');
  $('#m_consultas').addClass('active');
</script>
@endsection
