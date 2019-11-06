<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use App\Repositories\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    protected $usuarios;

    public function __construct(Usuarios $usuarios)
    {
        $this->usuarios = $usuarios;
    }

    public function index()
    {
        $usuarios = $this->usuarios->all();
    
        return view('usuarios.index', compact('usuarios'));
    }

    public function new()
    {
        return view('usuarios.new');
    }

    public function show($id)
    {
        $usuario = $this->usuarios->find($id);
    
        return view('usuarios.show', compact('usuario'));
    }


    public function getree()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $email = $_SESSION["email"];
        $senha = $_SESSION["senha"];
        $escola = $_SESSION["escola"];

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8080/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        
        $response = $client->request('GET', 'clientecod/'.$escola);
        
        $data = json_decode($response->getBody()->getContents(), true);
		//usort($data['menu'], 'cmp');
        $data2 = $data['menu'];
        $item = array();
		 foreach($data2 as $key => &$item) {
			$item['id'] = strval($item['id']);
		 }
		 
		$itemsByReference = array();
		// Build array of item references:
		 foreach($data2 as $key => &$item) {
			$itemsByReference[$item['id']] = &$item;
			// Children array:
			$itemsByReference[$item['id']]['children'] = array();
			// Empty data class (so that json_encode adds "data: {}" )
			$itemsByReference[$item['id']]['data'] = new \StdClass();
		 }
		// Set items as children of the relevant parent item.
		 foreach($data2 as $key => &$item)
			if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                $itemsByReference [$item['parent_id']]['children'][] = &$item;
                
		// Remove items that were added to parents elsewhere:
		 foreach($data2 as $key => &$item) {
			if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
				unset($data2[$key]);
		}
        
        // Encode:
		echo json_encode($data2);
		 
		function cmp($a, $b) {
		    return $a['ordem'] > $b['ordem'];
		}

    }

    public function save(Request $request)
    {
        $nome = $request->input('nome');
        $email = $request->input('email');
        $senha = $request->input('senha');

        $body = array(
            'nome' => $nome,
            'email' => $email,
            'senha' => $senha
        );

        json_encode($body);

        $client = new \GuzzleHttp\Client([
            'headers' => [ 
                'Accept' => 'application/json',
                'Content-type' => 'application/json']
        ]);

        $response = $client->post('http://localhost:8080/api/usuario',
            ['json' => $body]
        );

        //echo '<pre>' . var_export($response->getStatusCode(), true) . '</pre>';
        //echo '<pre>' . var_export($response->getBody()->getContents(), true) . '</pre>';

        return response()->json(['success'=>'Operação realizada com sucesso.']);
    }
    
}
