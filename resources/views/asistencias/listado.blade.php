@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Administración de asistencias
                        
                        <a href="{{route('asistencias')}}">Atrás</a>


                    </div>

                    <div class="card-body">
                       <table data-toggle="table" class="table table-striped" data-pagination="true" data-search="true" data-show-columns="true" data-show-refresh="true" data-buttons-class="info" data-icons-prefix="fa"  >
                          <thead>
                            <tr>

                              <th scope="col">#</th>
                              <th scope="col">Nombres</th>
                              <th scope="col">Asistencia</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($lista->listado as $cli)
                            @php($i++)
                            <tr >
                              <td >{{$i}}</th>
                              <td>{{$cli->clientes->nombre}} {{$cli->clientes->apellido}}</td>
                              <td>
                                @if($cli->estado)
                                  <input id="toggle-event" type="checkbox" data-toggle="toggle" class="cambiarAsis" checked="" data-on="SI" data-off="NO" data-offstyle="danger" data-id="{{$cli->id}}">
                                  
                                @else
                                  <input id="toggle-event" type="checkbox" data-toggle="toggle" class="cambiarAsis" data-on="SI" data-off="NO" data-offstyle="danger" data-id="{{$cli->id}}">
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
  $('#m_mensual').addClass('active');
  $('#m_asistencia').addClass('active');


  function eliminar(argument) {
    alertify.confirm("ESTA SEGURO DE ELIMINAR.","Se perdera toda la información",
    function(){
      window.location=$(argument).data('url');
    },
    function(){
      alertify.error('Cancelado');
    });
  }



   $(function() {
    $('.cambiarAsis').change(function() {
      var estado=$(this).prop('checked');
      var id=$(this).data('id');

      $.get( "{{route('cambiarAsis')}}", { id: id } )
      .done(function( data ) {
        if (data.estado==true) {
          console.log('si')
        }else{
          console.log('no')
        }
      });
      
    })
  });

    

 




</script>
@endsection
