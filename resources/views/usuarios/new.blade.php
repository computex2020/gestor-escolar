<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

use GuzzleHttp\Client;

$escola = $_SESSION["escola"];
$client = new Client([
    // Base URI is used with relative requests
    'base_uri' => 'http://localhost:8080/api/',
    // You can set any number of default request options.
    'timeout'  => 2.0,
]);

$response = $client->request('GET', 'clientecod/'.$escola);

$data = json_decode($response->getBody()->getContents(), true);


/*$menu = "";
foreach($data['menu'] as $item) {
	$menu .= ',' . $item['id'];
}*/
$menu = $data['menu'];
?>


@extends('layouts.app')
        
@section('content')
    <div class="py-1 text-left">
    <h3>Cadastro de Usuários</h3>
    </div>

    <div class="row">
        
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Informações</h4>
          <form>
            {{ csrf_field() }}
			<div class="row">
              <div class="col-md-9 mb-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="" value="" required>
                
              </div>
            </div>
			<div class="form-group">
              <label for="e_mail">E-mail </label>
              <input type="email" class="form-control" name="email" id="email" placeholder="" value="">
              <input type="hidden" name="jsfields" id="jsfields" value="" />
			  <input type="hidden" name="marcadas" id="marcadas" value="" />
			  <input type="hidden" name="requisicao" id="requisicao" value="" />
			  <input type="hidden" name="id" id="id" value="" />
            </div>
            <div class="form-group">
                <label for="senha">Senha </label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="" value="">
            </div>
            <hr class="mb-4">
			<div class="form-group">
                <button class="btn btn-success btn-submit">Salvar</button>
            </div>
          </form>
        </div>
		<div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Menu</span>
            <!--<span class="badge badge-secondary badge-pill">3</span>-->
          </h4>
		  
		  <div class="container-fluid">
			<div class="row">
				<div id="tree-data-container"></div>
			</div>
		  </div>
          
        </div>

@stop

@section('page-js-files')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
@stop

@section('page-js-script')
    
    <script type="text/javascript">
        var checadas = $("#marcadas").val();
        var ids = checadas.split(",");
        $(document).ready(function(){
            console.log("node");
            $('#tree-data-container').jstree({
                'plugins': ["checkbox"],
                'checkbox': { cascade: "down", three_state: false },
                'core' : {
                    'data' : {!! app(App\Http\Controllers\UsuariosController::class)->getree() !!}
                }
            })

            $(".jstree").on("loaded.jstree", function(){
                for (var i = 0, l = ids.length; i < l; i++) {
                    $('.jstree').jstree(true).select_node(ids[i]);
                }
            })
        });
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".btn-submit").click(function(e){
            e.preventDefault(); // stop the normal submission
            var nome       = $("#nome").val();
            var email     = $("#email").val();
            var id         = $("#id").val();
            console.log(nome);
            var selectedPermissions = [];
            var selectedElms = $('#tree-data-container').jstree("get_selected", true);
                $.each(selectedElms, function() {
                    selectedPermissions.push(this.id);
            });
        
            var opcoes = selectedPermissions.join(",");
            
            
            $.ajax({
                type:'POST',
                url:'/usuario/save',
                data:{nome:nome, email:email, marcadas:opcoes, _token: '{{csrf_token()}}'},
                success:function(data){
                    alert(data.success);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);

                },

            });
        });
    </script>
    <script src="{!!url('js/jstree.min.js')!!}"></script>
@stop