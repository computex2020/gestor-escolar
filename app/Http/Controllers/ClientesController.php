<?php

namespace App\Http\Controllers;


use App\Repositories\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    protected $clientes;

    public function __construct(Clientes $clientes)
    {
        $this->clientes = $clientes;
    }

    public function index()
    {
        $clientes = $this->clientes->all();
    
        return view('clientes.index', compact('clientes'));
    }

    public function show($id)
    {
        $cliente = $this->clientes->find($id);
    
        return view('clientes.show', compact('cliente'));
    }
}
