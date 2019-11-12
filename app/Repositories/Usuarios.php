<?php

namespace App\Repositories;


class Usuarios extends GuzzleHttpRequest
{
    
    public function all()
    {
        return $this->get('usuarios');
    }

    public function find($id)
    {        
        return $this->get("usuario/{$id}");
    }

    public function usuariosCliente()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $email = $_SESSION["email"];
        $senha = $_SESSION["senha"];
        $escola = $_SESSION["escola"];
        
        //echo $this->get('clientecod/'.$escola);
        return  response()->json(['codigo' => $escola]);
        //return $this->get('clientecod/'.$escola);
    }

}