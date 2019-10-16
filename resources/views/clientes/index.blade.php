<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
</head>
<body>
    <div class="container">
        <h1>Clientes</h1>
        @foreach ($clientes as $cliente)
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="/cliente/{{ $cliente->id}}">
                        {{ $cliente->nome_fantasia}}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>