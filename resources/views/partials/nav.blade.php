<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

use GuzzleHttp\Client;

$email = $_SESSION["email"];
$senha = $_SESSION["senha"];
$escola = $_SESSION["escola"];
/*if(isset($_POST["email"])) {
	$email = $_POST["email"];
	$senha = $_POST["senha"];
}*/
$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://localhost:8080/api/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);

$response = $client->request('GET', 'clientecod/'.$escola);

$data = json_decode($response->getBody()->getContents(), true);

usort($data['menu'], 'cmp');

foreach ($data['menu'] as $row) {
	$pai = "pai".$row['parent_id'];
	if (!isset($$pai))
		$$pai = array();
	
    $$pai[] = array("id"=> $row['id'],"text"=> $row['text'],"link"=> $row['link'],"parent_id"=> $row['parent_id']);
}

function cmp($a, $b) {
	return $a['ordem'] > $b['ordem'];
}

$primeira = true;
$primeiraEscola = "";
foreach ($data['escola'] as $rowEscola) 
{
	if ($primeira) {
		$primeiraEscola = $rowEscola['nome_fantasia'];
		$primeira = false;
	}
}

$login = false;
foreach ($data['pessoa'] as $rowPessoa) 
{
	if($email == $rowPessoa['email'] && $senha == $rowPessoa['senha']) {
		$login = true;
	}
}
if (!$login)
	return redirect()->route('logout');
?>

<nav class="navbar navbar-expand-sm bg-light">

<div class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!--<div class="navbar-header">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><img style="margin-top: 0px;" src="images/logo.png"></a>
			</div>
		</div>-->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown ml-auto">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $primeiraEscola }}</a>
					<div class="dropdown-menu dropdown-menu-right">
						@foreach ($data['escola'] as $rowEscola)
							@if ($primeiraEscola != $rowEscola["nome_fantasia"])
								<a href="#" class="dropdown-item">{{ $rowEscola["nome_fantasia"] }}</a>
							@endif
						@endforeach	
						<div class="dropdown-divider"></div>
						<a href="#"class="dropdown-item">Logout</a>
					</div>
				
				</li>
			
			</ul>
            <ul class="nav navbar-nav">
				@foreach ($data['menu'] as $row)
					<li>
					@if ($row["parent_id"] == 0)
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $row["text"] }}<b class="caret"></b></a>
                    @endif
					@php
					    $pai = "pai".$row['id']
                    @endphp
					@if (isset($$pai))
						<ul class="dropdown-menu">
						@foreach ($$pai as $row2)
                            @php
							    $father = "pai".$row2['id']
							@endphp
							@if (!isset($$father)) 
							
								<li><a href="{{ $row2['link'] }}">{{ $row2['text'] }}</a></li>
							@else
								<li class="dropdown-submenu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $row2['text'] }}</a>
								<ul class="dropdown-menu">
								@foreach ($$father as $row3)
									<li><a href="#">{{ $row3['text'] }}</a></li>
								@endforeach
								</ul>
								</li>
							@endif
						@endforeach
						</ul>
					@endif	
					</li>
                @endforeach
			</ul>
        </div><!--/.nav-collapse -->
    </div>
</div>	

</nav>