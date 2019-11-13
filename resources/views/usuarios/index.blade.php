@if(session_status() == 1)
    @php
        header("Location: " . URL::to('/'), true, 302);
        exit();
    @endphp
@endif

@extends('layouts.app')
        
@section('content')        


<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Cadastro de <b>Usuários</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="/usuario/new" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Adicionar novo Usuário</span></a>
                <!--<a href="#deleteClienteModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Excluir</span></a>	-->					
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover">
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
	                    <td>{{ $usuario->nome }}</td>
	                    <td>{{ $usuario->email }}</td>
	                    <td></td>
	                    <td></td>
	                    <td>
                            <a href="/usuario/edit/{{ $usuario->id}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                            <a href="/usuario/delete/{{ $usuario->id}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Excluir">&#xE872;</i></a>
	                    </td>
	                </tr>
            @endforeach
        </tbody>
    </table>
</div>        
@stop