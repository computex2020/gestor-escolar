<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestor Escolar</title>
        <link rel="stylesheet" href="<?php echo asset('css/gestor.css')?>" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        
    </head>
    <body>
        @include('partials.navlogin');
        <div class="container" style="position: relative;">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="fh5co-owl-text-wrap">
                        <div class="fh5co-owl-text">
                            <img src="images/icone_300.png" width="200px">
                            <h1 class="fh5co-lead to-animate">Gestor Escolar</h1>
                            <!--<h4 class="sub-title-gestor to-animate">Utilizado em diversos estabelecimentos de ensino os estados do Norte e Nordeste do brasil</h4>-->
                            
                        </div>
                    </div>
                </div>
            </div>
		</div>
        @include('partials.login');
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2020 Computex</p>
        </footer>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
