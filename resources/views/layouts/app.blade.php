<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="{{asset('apple-touch-icon.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/LOGOGYM.png')}}">
        <!-- bootstrap v4 css -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <!-- font-awesome css -->
        <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.css')}}">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
        <!-- rsmenu CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/rsmenu-main.css')}}">
        <!-- rsmenu transitions CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/rsmenu-transitions.css')}}">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/magnific-popup.css')}}">
        <!-- flaticon css  -->
        <link rel="stylesheet" type="text/css" href="{{asset('fonts/flaticon.css')}}">
        <!-- flaticon2 css  -->
        <link rel="stylesheet" type="text/css" href="{{asset('fonts/fonts2/flaticon.css')}}">
        <!-- Switch style CSS -->
        <link rel="stylesheet" href="{{asset('css/color-style.css')}}">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
        <!-- switch color presets css -->
        <link id="switch_style" href="#" rel="stylesheet" type="text/css">
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
        
         <!-- modernizr js -->
        <script src="{{asset('js/modernizr-2.8.3.min.js')}}"></script>
        <!-- jquery latest version -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
            <script src="{{asset('extras/popper.js-master/popper.min.js')}}" ></script>

        <!-- bootstrap js -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>        
        
        <!-- JavaScript -->
        <script src="{{ asset('extras/alertifyjs/alertify.min.js') }}"></script>  

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('extras/alertifyjs/css/alertify.min.css') }}"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="{{ asset('extras/alertifyjs/css/themes/default.min.css') }}"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="{{ asset('extras/alertifyjs/css/themes/bootstrap.min.css') }}"/>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{asset('extras/bootstrap-table-develop/dist/bootstrap-table.min.css')}}">

        <!-- Latest compiled and minified JavaScript -->
        <script src="{{asset('extras/bootstrap-table-develop/dist/bootstrap-table.min.js')}}"></script>

        <!-- Latest compiled and minified Locales -->
        <script src="{{asset('extras/bootstrap-table-develop/dist/locale/bootstrap-table-es-ES.min.js')}}"></script>
    
        <link rel="stylesheet" href="{{asset('extras/select2-4.0.6-rc.1/dist/css/select2.min.css')}}">
        <script src="{{asset('extras/select2-4.0.6-rc.1/dist/js/select2.min.js')}}"></script>
        <script src="{{asset('extras/select2-4.0.6-rc.1/dist/js/i18n/es.js')}}"></script>

        <script src="{{asset('extras/jquery-validation-1.17.0/dist/jquery.validate.min.js')}}"></script>

        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="home2">
        <!--Preloader area start here-->
        <!-- <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div> -->
        <!--Preloader area end here-->
        
        <!--Full width header Start-->
        <div class="full-width-header">
            <!-- Toolbar Start -->
            <div class="rs-toolbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="rs-toolbar-left">
                                <div class="welcome-message">
                                    
                                    @guest
                                        <i class="fa fa-bank"></i><span>Bienvenido a THE SPARTANS GYM</span> 
                                    @else
                                        <i class="fa fa-user"></i>  <span> {{ Auth::user()->nombre }}  {{ Auth::user()->apellido}} <b>Perfil: </b>{{ Auth::user()->perfil }}</span> 
                                    
                                    @endguest

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="rs-toolbar-right">
                                <div class="toolbar-share-icon">
                                    <ul>
                                        <li><a href="https://www.facebook.com/gimnasioentretenimiento/" target="_blanck"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://wego.here.com/directions/mix//The-Spartans-GYM,-2-Perez-Pareja,-Machachi:e-eyJuYW1lIjoiVGhlIFNwYXJ0YW5zIEdZTSIsImFkZHJlc3MiOiJKb3NcdTAwZTkgTWVqXHUwMGVkYSB5IDExIGRlIE5vdmllbWJyZSBlZGlmaWNpbyBNYXJcdTAwZWRhIEpvc1x1MDBlOSwgTWFjaGFjaGkiLCJsYXRpdHVkZSI6LTAuNTEyMzkwNiwibG9uZ2l0dWRlIjotNzguNTY4NjM5NiwicHJvdmlkZXJOYW1lIjoiZmFjZWJvb2siLCJwcm92aWRlcklkIjoyNDg3NDMwMjMxNDgxNDE0fQ==?map=-0.51239,-78.56864,15,normal&fb_locale=es_ES" target="_blanck"><i class="fa fa-map-marker"></i></a></li>
                                        
                                    </ul>
                                </div>
                                @guest
                                <a href="{{ route('login') }}" class="apply-btn">Ingresar</a>
                                <a href="{{ route('register') }}" class="apply-btn">Registrar</a>
                                @else
                                    <a href="{{ route('logout') }}" class="btn btn-link" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();" >Salir</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Toolbar End -->
            
            <!--Header Start-->
            <header id="rs-header" class="rs-header">
                <!-- Header Top Start -->
                <div class="rs-header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 rs-vertical-middle">
                                <div class="logo-area">
                                    <a href="{{ url('/') }}">
                                        <img src="{{asset('images/LOGOGYM.png')}}" alt="logo" class="img-thumbnail border border-dark">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="header-contact">
                                            <div id="phone-details" class="widget-text">
                                                <i class="glyph-icon flaticon-phone-call"></i>
                                                <div class="info-text">
                                                    <a href="tel:4155551234">
                                                        <span>Llamar</span>
                                                        0991143427 

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="header-contact">
                                            <div id="info-details" class="widget-text">
                                                <i class="glyph-icon flaticon-email"></i>
                                                <div class="info-text">
                                                    <a href="mailto:info@domain.com">
                                                        <span>Correo</span>
                                                        pepeocana22@gmail.com
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="header-contact">
                                            <div id="address-details" class="widget-text">
                                                <i class="glyph-icon flaticon-placeholder"></i>
                                                <div class="info-text">
                                                    <span>Dirección</span>
                                                    Machachi-Ecuador
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
                <!-- Header Top End -->

                <!-- Menu Start -->
                <div class="menu-area menu-sticky">
                    <div class="container">
                        <div class="main-menu">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- <div id="logo-sticky" class="text-center">
                                        <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                                    </div> -->
                                    <a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
                                    <nav class="rs-menu">
                                        <ul class="nav-menu">
                                            <!-- Home -->
                                            <li class="" id="m_inicio"> <a href="{{url('/')}}" class="home">Inicio</a></li>

                                           

                                            <li class="menu-item-has-children" id="m_consultas"> <a href="#">Consultas</a>
                                                <ul class="sub-menu">
                                                    <li id="m_miasistencia"><a href="{{route('miasistenciaConsulta')}}">Asistencia</a></li>
                                                    <li id="m_mipagos"><a href="{{route('mipagosConsulta')}}">Pagos</a></li>
                                                    <li id="m_midieta"><a href="{{route('midietaConsulta')}}">Dietas</a></li>
                                                    
                                                </ul>
                                            </li>



                                            <li class="menu-item-has-children" id="m_catagolo"> <a href="#">Catálogos</a>
                                                <ul class="sub-menu">
                                                    <li id="m_producto"><a href="{{route('CatalogoProducto')}}">Productos</a></li>
                                                    <li id="m_maquina"><a href="{{route('CatalogoMaquina')}}">Maquinas</a></li>
                                                    
                                                </ul>
                                            </li>
                                            
                                            <!-- End Home -->
                                           
                                            
                                            <!--Contact Menu Start-->
                                            @guest
                                            
                                            @else
                                                @if(Auth::user()->perfil =='Administrador')

                                                    <li class="menu-item-has-children" id="m_registro"> <a href="#">Registros</a>
                                                        <ul class="sub-menu">
                                                            <li id="m_cliente"><a href="{{route('clientes')}}">Clientes</a></li>
                                                            <li id="m_categoria"><a href="{{route('categorias')}}">Categorias</a></li>
                                                            <li id="m_maquina"><a href="{{route('maquinas')}}">Maquinas</a></li>
                                                            <li id="m_producto"><a href="{{route('productos')}}">Productos</a></li>
                                                        </ul>
                                                    </li>

                                                    <li class="menu-item-has-children" id="m_mensual"> <a href="#">Pagos</a>
                                                        <ul class="sub-menu">
                                                            <li id="m_factura"><a href="{{route('facturas')}}">Comprobante de  pago</a></li>
                                                            <li id="m_asistencia"><a href="{{route('asistencias')}}">Asistencias</a></li>
                                                        </ul>
                                                    </li>

                                                    <li class="menu-item-has-children"> <a href="#">Dietas</a>
                                                        <ul class="sub-menu">                              
                                                            <li><a href="{{route('dietas')}}">Asignar dieta</a></li>
                                                        </ul>
                                                    </li>

                                                     <li class="" id="m_rutinas"> 
                                                        <a href="{{route('rutinas')}}" class="home">Rutinas de ejercicio</a>
                                                    </li>

                                                    
                                                @endif
                                            @endguest

                                            <!--Contact Menu End-->
                                        </ul>
                                    </nav>  
                                    <!-- <a class="hidden-xs rs-search" href="#"><i class="fa fa-sign-in"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu End -->
            </header>
            <!--Header End-->

        </div>
        <!--Full width header End-->


       @foreach (['success', 'error', 'warning', 'message'] as $msg)
            @if(Session::has($msg))

              <script>
                 alertify.{{$msg}}("{{Session::get($msg)}}");
              </script>

            @endif
        @endforeach

        @if ($errors->any())

            <script>
                
                @foreach ($errors->all() as $error)
                       
                    alertify.error('{{$error}}');

                @endforeach

            </script>
        @endif


          
                    @yield('content')
           
        

       
        <!-- Footer Start -->
        <footer id="rs-footer" class="bg3 rs-footer">
            <div class="container">
                <!-- Footer Address -->
                <div>
                    <div class="row footer-contact-desc">
                        <div class="col-md-3">
                            <div class="contact-inner">
                                <i class="fa fa-map-marker"></i>
                                <h4 class="contact-title">Dirección</h4>
                                <p class="contact-desc">
                                    Machachi<br>
                                    José Mejía y 11 de Noviembre Cuarto piso del edificio María José
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="contact-inner">
                                <i class="fa fa-phone"></i>
                                <h4 class="contact-title">Contacto</h4>
                                <p class="contact-desc">
                                    0991143427
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="contact-inner">
                                <i class="fa fa-map-marker"></i>
                                <h4 class="contact-title">Email</h4>
                                <p class="contact-desc">
                                    pepeocana22@gmail.com
                                
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="contact-inner">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <h4 class="contact-title">Horario</h4>
                                    <p class="contact-desc">
                                        06:45 - 21:30
                                    </p>
                                </div>
                            </div>
                    </div>                  
                </div>
            </div>
            
            <!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="about-widget">
                              
                              
                                <p>
                                    

                                </p>
                              
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <h5 class="footer-title"> </h5>
                            <div class="recent-post-widget">
                                  <p class="margin-remove">
                                    

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-share">
                        <ul>
                            
                            <li><a href="https://www.facebook.com/gimnasioentretenimiento/" target="_blanck"><i class="fa fa-facebook"></i></a></li>  
                            <li><a href="https://wego.here.com/directions/mix//The-Spartans-GYM,-2-Perez-Pareja,-Machachi:e-eyJuYW1lIjoiVGhlIFNwYXJ0YW5zIEdZTSIsImFkZHJlc3MiOiJKb3NcdTAwZTkgTWVqXHUwMGVkYSB5IDExIGRlIE5vdmllbWJyZSBlZGlmaWNpbyBNYXJcdTAwZWRhIEpvc1x1MDBlOSwgTWFjaGFjaGkiLCJsYXRpdHVkZSI6LTAuNTEyMzkwNiwibG9uZ2l0dWRlIjotNzguNTY4NjM5NiwicHJvdmlkZXJOYW1lIjoiZmFjZWJvb2siLCJwcm92aWRlcklkIjoyNDg3NDMwMjMxNDgxNDE0fQ==?map=-0.51239,-78.56864,15,normal&fb_locale=es_ES" target="_blanck"><i class="fa fa-map-marker"></i></a></li>
                        </ul>
                    </div>                                
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="copyright">
                        <p>© 2018 <a href="#">THE SPARTANS GYM</a>. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div>

        
        

       
        <!-- owl.carousel js -->
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <!-- slick.min js -->
        <script src="{{asset('js/slick.min.js')}}"></script>
        <!-- isotope.pkgd.min js -->
        <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- wow js -->
        <script src="{{asset('js/wow.min.js')}}"></script>
        <!-- counter top js -->
        <script src="{{asset('js/waypoints.min.js')}}"></script>
        <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
        <!-- magnific popup -->
        <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
        <!-- rsmenu js -->
        <script src="{{asset('js/rsmenu-main.js')}}"></script>
        <!-- plugins js -->
        <script src="{{asset('js/plugins.js')}}"></script>
        <!-- Switch js -->
        <script src="{{asset('js/color-style.js')}}"></script>
        <!-- main js -->
        <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>