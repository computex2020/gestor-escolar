<?php

namespace App\Repositories;


class Clientes extends GuzzleHttpRequest
{
    
    public function all()
    {
        return $this->get('clientes');
    }

    public function find($id)
    {        
        return $this->get("cliente/{$id}");
    }

}