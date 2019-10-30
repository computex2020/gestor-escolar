		 <?php
		 //Faz o include da classe Comunicacao
		 include 'comunicacao.php';
		 
		 //Cria um novo objeto da classe
		 $Comunicacao = new Comunicacao;
		 
		 //Define os dados de cabeçalho da requisição
		 $cabecalho = array('Content-Type: application/json', 'X-AUTH-TOKEN: @@@@@@@@@@@@@@@@@@@');
		 
		 //Configura o conteúdo a ser enviado
		 $conteudo = '{"descricao": "Supervisão"}';
		 
		 //Define a URL para consumo do serviço
		 $url = 'http://localhost:8080/api/menus';
		 
		 //Tipo de requisição: POST ou GET
		 $tpRequisicao = 'GET';
		 
		 //Faz a chamada da função, passando os parâmetros
		 $resposta = $Comunicacao->enviaConteudoParaAPI($cabecalho, $conteudo, $url, $tpRequisicao);
		 
		 //Exibe a resposta da API
		 //echo $resposta;
		 $data = json_decode($resposta, true);
		 usort($data, 'cmp');
		 foreach($data as $key => &$item) {
			$item['id'] = strval($item['id']);
		 }
		 
		 $itemsByReference = array();
		// Build array of item references:
		 foreach($data as $key => &$item) {
			$itemsByReference[$item['id']] = &$item;
			// Children array:
			$itemsByReference[$item['id']]['children'] = array();
			// Empty data class (so that json_encode adds "data: {}" )
			$itemsByReference[$item['id']]['data'] = new StdClass();
		 }
		// Set items as children of the relevant parent item.
		 foreach($data as $key => &$item)
			if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
				$itemsByReference [$item['parent_id']]['children'][] = &$item;
		// Remove items that were added to parents elsewhere:
		 foreach($data as $key => &$item) {
			if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
				unset($data[$key]);
		}
		
		// Encode:
		 echo json_encode($data);
		 
		 function cmp($a, $b) {
			return $a['ordem'] > $b['ordem'];
		 }
		 ?>