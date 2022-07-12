<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
	============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/backend/img/Logo_mariscal_caceres.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">

    <!-- Google Fonts
	============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
	============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">

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
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/main.css') }}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/backend/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('/backend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>
    <div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
			    <h3>Inicia sesión</h3>
			    <p>Ingrese sus credenciales</p>
            </div>
		    <div class="content-error">
				<div class="hpanel">
			        <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                            <div class="row mb-3">
                                <label class="control-label" for="dni">DNI</label>
                                <input type="text" placeholder="dni" title="Please enter you username" value="{{old('dni')}}" name="dni" id="dni" class="form-control @error('dni') is-invalid @enderror" required autocomplete="dni" autofocus>
                                @error('email')
                                    <span class="help-block small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="control-label" for="password">Contraseña</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password">
                                @error('password')
                                    <span class="help-block small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
			    	    		    	Recuerda me
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-default btn-block" href="{{ route('password.request') }}">
                                    Olvidé mi contraseña
                                </a>
                            @endif
                        </form>
                    </div>
			    </div>
			<div class="text-center login-footer">
				<p>Licencia MIT © 2020. </p>
			</div>
		</div>   
    </div>
</body>
</html>