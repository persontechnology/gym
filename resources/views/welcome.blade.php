@extends('layouts.app')

@section('content')
<!-- mc=peso/altura ele2 -->
        <!-- Slider Area Start -->
        <div id="rs-slider" class="slider-overlay-1">     
            <div id="home-slider">
                <!-- Item 1 -->
                <div class="item active">
                    <img src="images/slider/home2/a.png" alt="Slide1" />
                    <div class="slide-content">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="container">
                                    <h1 class="slider-title" data-animation-in="fadeInLeft" data-animation-out="animate-out"> <br> </h1>
                                    <p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">
                                        
                                    </p>  
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="item">
                    <img src="images/slider/home2/b.png" alt="Slide2" />
                    <div class="slide-content">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="container">
                                    <h1 class="slider-title" data-animation-in="fadeInUp" data-animation-out="animate-out"> </h1>
                                    <p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">
                                        
                                    </p>  
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="item">
                    <img src="images/slider/home2/c.png" alt="Slide3" />
                    <div class="slide-content">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="container">
                                    <h1 class="slider-title" data-animation-in="fadeInUp" data-animation-out="animate-out"> </h1>
                                    <p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">
                                        
                                    </p>  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>         
        </div>
        <!-- Slider Area End -->
        
        <!-- Search Courses Start -->
        
        <!-- Search Courses End -->

        

        <!-- Courses Start -->
        <div id="rs-courses-2" class="rs-courses-2 sec-spacer">
            <div class="container">
                <div class="sec-title mb-50">
                    <h2>SERVICIOS</h2>      
                    <p>
                        The Spartans Gym ofrece a sus clientes:
                    </p>
                    
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="cource-item">
                            <div class="cource-img">
                                <a href="#"><img src="{{asset('images/courses/BAILOTERAPIA.jpeg')}}" alt="" /></a>
                                <a class="image-link" href="#" title="">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                            <div class="course-body">
                                <a href="#" class="course-category">ENTRENAMIENTO DE BRAZOS</a>
                                <h4 class="course-title"><a href="#"> </a></h4>
                                <div class="course-desc">
                                    <p>
                                        
                                    </p>
                                </div>
                                
                            </div>
                        </div>                      
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cource-item">
                            <div class="cource-img">
                                <img src="{{asset('images/courses/entrenamiento.jpeg')}}" alt="" />
                                <a class="image-link" href="#" title="University Tour 2018">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                            <div class="course-body">
                                <a href="#" class="course-category">ENTRENAMIENTO DE PIERNAS</a>
                                <h4 class="course-title"><a href="#"> </a></h4>
                                <div class="course-desc">
                                    <p>
                                        
                                    </p>
                                </div>
                                
                            </div>
                        </div>                      
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cource-item">
                            <div class="cource-img">
                                <img src="{{asset('images/courses/culturismo.jpeg')}}" alt="" />
                                <a class="image-link" href="#" title="University Tour 2018">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                            <div class="course-body">
                                <a href="#" class="course-category">ENTRENAMIENTO DE TRICEPS</a>
                                <h4 class="course-title"><a href="#"> </a></h4>
                                <div class="course-desc">
                                    <p>
                                        
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses End -->


        <div id="rs-courses-2" class="rs-courses-2 sec-spacer">
            <div class="container">
                <div class="sec-title mb-50">
                    <h2>DESCARGA NUESTRO APLICACIÓN MOVIL</h2>      
                    <p>
                        Aplicación movil:
                    </p>
                <a href="{{ url('apk/com.companyname.app_gym.apk')}}" target="_blank">Descargar APK ANDROID</a>
                <img src="{{ asset('apk/qrcode_spartagym.png') }}" alt="sss" class="img img-fluid">
                </div>
            </div>
        </div>

        <!-- Team Start -->
        <div id="rs-team" class="rs-team sec-color sec-spacer mt-0">
            <div class="container">
                <div class="sec-title mb-50 text-center">
                    <h2>Instructores especializados y certificados por la Federación deportiva de Pichincha</h2>      
                    <p>
                        Contamos con el mejor equipo profesional, disponible en todo momento para ofrecer soluciones y ayudar a nuestros usuarios a alcanzar sus retos no solo deportivos, sino también de salud y bienestar.
                    </p>
                  
                </div>
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">


                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('images/team/c.JPG')}}" alt="team Image" />
                            <div class="normal-text">
                                <h3 class="team-name">JOSÉ OCAÑA</h3>
                                <span class="subtitle">GERENTE</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('images/team/a.JPG')}}" alt="team Image" />
                            <div class="normal-text">
                                <h3 class="team-name">CRISTINA OCAÑA</h3>
                                <span class="subtitle">CONTADORA</span>
                            </div>
                        </div>
                       
                    </div>
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('images/team/d.JPG')}}" alt="team Image" />
                            <div class="normal-text">
                                <h3 class="team-name">LUIS OCAÑA</h3>
                                <span class="subtitle"> INSTRUCTOR</span>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->



        <!-- Calltoaction Start -->
    
        <!-- Calltoaction End -->



        <!-- Pricing Plan Start -->
        

        <!-- Pricing Plan End -->

      

        <!-- Video Start -->
        
        <!-- Testimonial End -->
        
        <!-- Partner Start -->
        
        <!-- Partner End -->

        <script type="text/javascript">
            $('#m_inicio').addClass('active');
        </script>
@endsection
