<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeriadosController extends Controller
{
    public function index()
    {
        return view('feriados.index', ['body_class' => 'bg-noimage']);
    }
}
