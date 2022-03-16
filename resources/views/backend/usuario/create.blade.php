@extends('layouts.backend')

@section('content')
<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline16-list">
                <div class="sparkline16-hd">
                    <div class="main-sparkline16-hd">
                        <h1>Crear usuario</h1>
                    </div>
                </div>
                <div class="sparkline16-graph">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('usuarioStore')}}" method="POST" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Apellido</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Apellido">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="dni">DNI</label>
                                    <input type="text" name="dni" class="form-control" placeholder="DNI">
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" class="form-control" min="1920-01-01">
                                </div>
                                <div class="form-group">
                                    <label for="sexo">Sexo</label><br>
                                    <input type="radio" class="form-check-input" id="sexo1" name="sexo" value="0">
                                    <label for="sexo1">Mujer</label><br>
                                    <input type="radio" class="form-check-input" id="sexo2" name="sexo" value="1">
                                    <label for="sexo2">Hombre</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                              <label for="roles">Roles:</label>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-check">
                                    @foreach($roles as $role)
                                      <p>
                                        <label for="" class="form-check-label">
                                          <input type="checkbox" class="form-check-input" name="rolesSelected[]" value="{{ $role->id }}">
                                          <em>{{ $role->display_name }}</em>
                                        </label>
                                      </p>
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Guardar</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('styles')
<!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/main.css')}}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/calendar/fullcalendar.print.min.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('backend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
@endpush

@push('scripts')
    <!-- jquery
		============================================ -->
    <script src="{{ asset('backend/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('backend/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('backend/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('backend/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('backend/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('backend/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('backend/js/jquery.scrollUp.min.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('backend/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('backend/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{ asset('backend/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('backend/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{ asset('backend/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{ asset('backend/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{ asset('backend/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="{{ asset('backend/js/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('backend/js/datapicker/datepicker-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{ asset('backend/js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{ asset('backend/js/morrisjs/morris.js')}}"></script>
    <script src="{{ asset('backend/js/morrisjs/morris-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{ asset('backend/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('backend/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{ asset('backend/js/sparkline/sparkline-active.js')}}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{ asset('backend/js/calendar/moment.min.js')}}"></script>
    <script src="{{ asset('backend/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('backend/js/calendar/fullcalendar-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('backend/js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('backend/js/main.js')}}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="{{ asset('backend/js/tawk-chat.js')}}"></script>
@endpush

@push('sidebar')
  
  <!-- Mobile Menu end -->
  <div class="breadcome-area">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="breadcome-list">
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="breadcome-heading">
                                  
                                  
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <ul class="breadcome-menu">
                                  <li>
                                      <a href="{{route('home')}}">Home</a> <span class="bread-slash">/</span>
                                  </li>
                                  <li>
                                    <a title="Usuarios" href="{{route('usuarioIndex')}}"><span class="bread-blod">Usuarios</span></a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endpush