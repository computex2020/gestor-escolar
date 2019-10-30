<?php

namespace App\Http\Controllers;


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

    public function show($id)
    {
        $usuario = $this->usuarios->find($id);
    
        return view('usuarios.show', compact('usuario'));
    }

    public function getTree(){
        $nodes = $this->category->orderByDepth();
        echo json_encode($nodes);

    }
    
}
