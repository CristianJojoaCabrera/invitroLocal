<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>InVitro</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <img src="{{ asset('img/logo.png') }}" class="img-responsive">
        </div>
        <h3>Bienvenido a InVitro</h3>
        <p>Iniciar Sesión</p>
        <form class="m-t" role="form" action="{{ route('login') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Usuario" required="" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required="">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Iniciar</button>

            <a href="{{ route('password.request') }}"><small>¿Olvidó su contraseña?</small></a>
            <p class="text-muted text-center"><small>¿No tiene una cuenta?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="register.html">Crear una cuenta</a>
        </form>
        <p class="m-t"> <small>&copy; 2018</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
