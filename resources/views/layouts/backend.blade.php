<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Proyecto Colegio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/normalize.css') }}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/meanmenu.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/main.css') }}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/educate-custon-icon.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/css/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('/backend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    @stack('styles')
</head>
<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{route('home')}}"><img class="main-logo" src="{{ asset('backend/img/logo/logo.png') }}" alt="" /></a>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                    @if(Auth::user()->hasRole('administrador'))
                      <li>
                        <a aria-expanded="false" href="{{ route('usuarioIndex')}}">
						  <span class="educate-icon educate-home icon-wrap sub-icon-mg" aria-hidden="true"></span>
						  <span class="mini-click-non">Usuarios</span>
						</a>
                      </li>
                    @endif
                    @if(Auth::user()->hasRole('administrador'))
                      <li>
                          <a aria-expanded="false" href="{{ route('cursoIndex')}}"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Cursos</span></a>
                      </li>
                    @endif
                      @if(Auth::user()->hasRole('docente'))
                      <li>
                          <a aria-expanded="false" href="{{ route('cursoDocenteLista',Auth::user()->id)}}"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Cursos </span></a>
                      </li>
                      @endif
                    @if(Auth::user()->hasRole('administrador'))
                      <li>
                          <a aria-expanded="false" href="{{ route('salonIndex')}}"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Salones</span></a>
                      </li>
                    @endif
                    @if(Auth::user()->hasRole('alumno'))
                      <li>
                          <a aria-expanded="false" href="{{ route('cursoAlumnoLista',Auth::user()->id)}}"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Cursos </span></a>
                      </li>
                    @endif
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="logo-pro">
                      <a href="index.html"><img class="main-logo" src="{{ asset('backend/img/logo/logo.png')}}" alt="" /></a>
                  </div>
              </div>
          </div>
        </div>
        <div class="header-advance-area">
          <div class="header-top-area">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="header-top-wraper">
                              <div class="row">
                                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                      <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                          <i class="educate-icon educate-nav"></i>
                                        </button>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                      <div class="header-top-menu tabl-d-n">
                                          
                                      </div>
                                  </div>
                                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                      <div class="header-right-info">
                                          <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                              <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                      <img src="{{ asset('backend/img/product/pro4.jpg')}}" alt="" />
                                                      <span class="admin-name">{{ Auth::user()->name }}</span>
                                                      <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                  <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                      <li>
                                                          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                              <span class="edu-icon edu-locked author-log-ic"></span>{{ __('Logout') }}
                                                          </a>
                                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                              @csrf
                                                          </form>
                                                      </li>
                                                  </ul>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Mobile Menu start -->
          <div class="mobile-menu-area">
            <div class="container">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="mobile-menu">
                          <nav id="dropdown">
                              <ul class="mobile-menu-nav">
                                @if(Auth::user()->hasRole('administrador'))
                                    <li><a href="{{ route('usuarioIndex')}}">Usuario <span class="admin-project-icon edu-icon "></span></a></li>
                                @endif
                                @if(Auth::user()->hasRole('administrador'))
                                    <li><a href="{{ route('cursoIndex')}}">Usuario <span class="admin-project-icon edu-icon "></span></a></li>
                                @endif
                                @if(Auth::user()->hasRole('administrador'))
                                    <li><a href="{{ route('salonIndex')}}">Cursos <span class="admin-project-icon edu-icon "></span></a></li>
                                @endif
                                @if(Auth::user()->hasRole('docente'))
                                    <li><a href="{{ route('cursoDocenteLista',Auth::user()->id)}}">Cursos <span class="admin-project-icon edu-icon "></span></a></li>
                                @endif
                                  <li><a href="{{ route('salonIndex')}}">Salones <span class="admin-project-icon edu-icon "></span></a></li>
                              </ul>
                          </nav>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        @stack('sidebar')
        @yield('content')
        @yield('footer')
    </div>
    <!-- jquery
		============================================ -->
    <script src="{{ asset('/backend/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('/backend/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('/backend/js/wow.min.js') }}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('/backend/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('/backend/js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('/backend/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('/backend/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('/backend/js/jquery.scrollUp.min.js') }}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('/backend/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('/backend/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('/backend/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('/backend/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('/backend/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{ asset('/backend/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/backend/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{ asset('/backend/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/backend/js/sparkline/jquery.charts-sparkline.js') }}"></script>
    <script src="{{ asset('/backend/js/sparkline/sparkline-active.js') }}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{ asset('backend/js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('backend/js/calendar/fullcalendar-active.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('/backend/js/plugins.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('/backend/js/main.js') }}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="{{ asset('/backend/js/tawk-chat.js') }}"></script>
    @stack('scripts')
</body>
</html>