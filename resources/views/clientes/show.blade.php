<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
</head>
<body>
    <div class="container">
        <h1>Clientes</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3> {{ $cliente->nome_fantasia }}</h3>
                </div>
                <div class="panel-body">
                        {{ $cliente->endereco}}
                        <br>
                        <a href="/">Voltar</a>
                </div>
            </div>
    </div>
</body>
</html>