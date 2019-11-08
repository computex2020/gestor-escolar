@extends('layouts.app')
        
@section('content')        
{{--<div class="card">
  <h5 class="card-header h5">Usuários</h5>
  <div class="card-body">
    <p class="card-text">
        @foreach ($usuarios as $usuario)
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="/usuario/{{ $usuario->id}}">
                        {{ $usuario->nome}}
                    </a>
                </div>
            </div>
        @endforeach
    </p>
  </div>
</div>--}}
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Cadastro de <b>Feriados</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="#" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Adicionar novo Feriado</span></a>
                				
            </div>
        </div>
    </div>
    {{--<table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th></th>
                <th></th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                    <tr>
	                    <td>{{ $usuario->nome}}</td>
	                    <td>{{ $usuario->email}}</td>
	                    <td></td>
	                    <td></td>
	                    <td>
                            <a href="/usuario/edit/{{ $usuario->id}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                            <a href="/usuario/delete/{{ $usuario->id}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Excluir">&#xE872;</i></a>
	                    </td>
	                </tr>
            @endforeach
        </tbody>
    </table>--}}
</div>        
@stop