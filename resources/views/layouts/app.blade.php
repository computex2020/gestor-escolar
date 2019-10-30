<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestor Escolar</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Styles -->
        <style>
            body {
                font-family: "Source Sans Pro", Arial, sans-serif;
                font-weight: 400;
                font-size: 16px;
                line-height: 1.8;
                color: #777777;
                color: #7f7f7f;
                background: #fff;
                height: 100%;
                position: relative;
                width: 100% !important;
                /*background-image: url("images/class_room_menor.png") !important; */
                background-size: auto;
                background-repeat: no-repeat;
                }
                .modal-login {
                    width: 320px;
                }
                .modal-login .modal-content {
                    border-radius: 1px;
                    border: none;
                }
                .modal-login .modal-header {
                    position: relative;
                    justify-content: center;
                    background: #f2f2f2;
                }
                .modal-login .modal-body {
                    padding: 30px;
                }
                .modal-login .modal-footer {
                    background: #f2f2f2;
                }
                .modal-login h4 {
                    text-align: center;
                    font-size: 26px;
                }
                .modal-login label {
                    font-weight: normal;
                    font-size: 13px;
                }
                .modal-login .form-control, .modal-login .btn {
                    min-height: 38px;
                    border-radius: 2px; 
                }
                .modal-login .hint-text {
                    text-align: center;
                }
                .modal-login .close {
                    position: absolute;
                    top: 15px;
                    right: 15px;
                }
                .modal-login .checkbox-inline {
                    margin-top: 12px;
                }
                .modal-login input[type="checkbox"]{
                    margin-top: 2px;
                }
                .modal-login .btn {
                    min-width: 100px;
                    background: #3498db;
                    border: none;
                    line-height: normal;
                }
                .modal-login .btn:hover, .modal-login .btn:focus {
                    background: #248bd0;
                }
                .modal-login .hint-text a {
                    color: #999;
                }

                .dropdown-submenu {
                    position: relative;
                }

                .dropdown-submenu>.dropdown-menu {
                    top: 0;
                    left: 100%;
                    margin-top: -6px;
                    margin-left: -1px;
                    -webkit-border-radius: 0 6px 6px 6px;
                    -moz-border-radius: 0 6px 6px;
                    border-radius: 0 6px 6px 6px;
                }

                .dropdown-submenu:hover>.dropdown-menu {
                    display: block;
                }

                .dropdown-submenu>a:after {
                    display: block;
                    content: " ";
                    float: right;
                    width: 0;
                    height: 0;
                    border-color: transparent;
                    border-style: solid;
                    border-width: 5px 0 5px 5px;
                    border-left-color: #ccc;
                    margin-top: 5px;
                    margin-right: -10px;
                }

                .dropdown-submenu:hover>a:after {
                    border-left-color: #fff;
                }

                .dropdown-submenu.pull-left {
                    float: none;
                }

                .dropdown-submenu.pull-left>.dropdown-menu {
                    left: -100%;
                    margin-left: 10px;
                    -webkit-border-radius: 6px 0 6px 6px;
                    -moz-border-radius: 6px 0 6px 6px;
                    border-radius: 6px 0 6px 6px;
                }

                .navbar-custom {
                    background-color: #435d7d;
                }
                /* change the brand and text color */
                .navbar-custom .navbar-brand,
                .navbar-custom .navbar-text {
                    color: rgba(255,255,255,.8);
                }
                /* change the link color */
                .navbar-custom .navbar-nav .nav-link {
                    color: rgba(255,255,255,.8);
                }
                /* change the color of active or hovered links */
                .navbar-custom .nav-item.active .nav-link,
                .navbar-custom .nav-item:hover .nav-link {
                    color: #ffffff;
                }
                a.navbar-brand {
                padding: 1px 0;
                }

                input[type=text], .txtarea{
                    margin-bottom: 10px;
                }


                .dropdown-submenu {
                    position: relative;
                }

                .dropdown-submenu>.dropdown-menu {
                    top: 0;
                    left: 100%;
                    margin-top: -6px;
                    margin-left: -1px;
                    -webkit-border-radius: 0 6px 6px 6px;
                    -moz-border-radius: 0 6px 6px;
                    border-radius: 0 6px 6px 6px;
                }

                .dropdown-submenu:hover>.dropdown-menu {
                    display: block;
                }

                .dropdown-submenu>a:after {
                    display: block;
                    content: " ";
                    float: right;
                    width: 0;
                    height: 0;
                    border-color: transparent;
                    border-style: solid;
                    border-width: 5px 0 5px 5px;
                    border-left-color: #ccc;
                    margin-top: 5px;
                    margin-right: -10px;
                }

                .dropdown-submenu:hover>a:after {
                    border-left-color: #fff;
                }

                .dropdown-submenu.pull-left {
                    float: none;
                }

                .dropdown-submenu.pull-left>.dropdown-menu {
                    left: -100%;
                    margin-left: 10px;
                    -webkit-border-radius: 6px 0 6px 6px;
                    -moz-border-radius: 6px 0 6px 6px;
                    border-radius: 6px 0 6px 6px;
                }
        </style>
    </head>
    <body>
        @if(Request::segment(1) != '' && Request::segment(1) != 'home')
            @include('partials.nav');
        @else
            @if(Request::segment(1) == 'home')
                @php
                    if(isset($_POST["escola"]) || session_status() != PHP_SESSION_NONE) {
                        if (session_status() == PHP_SESSION_NONE) {
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        @yield('page-js-script')
        
    </body>
</html>