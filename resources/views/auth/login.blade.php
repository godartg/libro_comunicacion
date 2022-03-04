<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
	============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">

    <!-- Google Fonts
	============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
	============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

    <!-- Bootstrap CSS
	============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
	============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
			    <h3>PLEASE LOGIN TO APP</h3>
			    <p>This is the best app ever!</p>
            </div>
		    <div class="content-error">
				<div class="hpanel">
			        <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                            <div class="row mb-3">
                                <label class="control-label" for="username">{{ __('Email Address') }}</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="{{ old('email') }}" value="" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="help-block small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="control-label" for="password">{{ __('Password') }}</label>
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
			    	    		    	{{ __('Remember Me') }} 
                                    </label>
                                    <p class="help-block small">(if this is a private computer)</p>
                                </div>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-default btn-block" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
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