@extends('layouts.app')

@section('content')
<div class="sec-spacer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">CATALOGO DE MAQUINA
                       
                    <div class="card-body">
                        <div id="demo" class="carousel slide" data-ride="carousel">
                          

                          <ul class="carousel-indicators">
                            @php($i=0)
                            @foreach($maquinas as $m)
                            <li data-target="#demo" data-slide-to="{{$i}}" class="{{$i==0 ? 'active' : ''}}"></li>
                            @php($i++)
                            @endforeach
                          </ul>

                          <div class="carousel-inner">
                            @php($i=0)
                            @foreach($maquinas as $m)

                            <div class="carousel-item {{$i==0 ? 'active' : ''}}">
                                
                                <img src="{{Storage::url('public/images/maquinas/'.$m->foto)}}" width="1100" height="500">

                              <div class="carousel-caption">
                                <h3 class="bg-secondary mb-0">{{ $m->nombre}}</h3>
                              </div>   
                            </div>

                            @php($i++)
                            @endforeach
                          </div>

                          <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                          </a>
                          <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                          </a>
                        </div>
                       
                    </div>


                    <div class="carousel-item">
                      <img src="http://qnimate.com/wp-content/uploads/2014/03/images2.jpg" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>S</h5>
                        <p>S</p>
                      </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#m_catagolo').addClass('active');
    $('#m_maquina').addClass('active');
    
</script>
@endsection
