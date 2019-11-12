<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestor Escolar</title>
        <link rel="stylesheet" href="{!!url('themes/default/style.css')!!}" />
        <link rel="stylesheet" href="<?php echo asset('css/gestor.css')?>" type="text/css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    </head>
    <body class="{{ $body_class }}">
        @if(Request::segment(1) != '' && Request::segment(1) != 'home')
            @include('partials.nav');
        @else
            @if(Request::segment(1) == 'home')
                @php
                    if(isset($_POST["escola"]) || session_status() != 1) {
                        if (session_status() == 1) {
                            session_start();
                        }
                        if(isset($_POST["escola"])) {
                            $_SESSION["escola"] = $_POST["escola"];
                            $_SESSION["email"] = $_POST["email"];
                            $_SESSION["senha"] = $_POST["senha"];
                        }
                        @endphp
                            @include('partials.nav');
                        @php
                    } else {
                        @endphp
                            @include('partials.navlogin');
                        @php
                    }
                @endphp
            @else
                @include('partials.navlogin');    
            @endif
        @endif
        

        <div class="container" style="position: relative;">
            @yield('content')
            
		</div>
        @include('partials.login');
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2020 Computex</p>
        </footer>
        @yield('page-js-files')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        @yield('page-js-script')
        
    </body>
    
</html>