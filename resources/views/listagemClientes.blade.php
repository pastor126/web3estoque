@extends('template')

@section('conteudo')
<h4>Clientes</h4>
    <a class="btn btn-primary mb-2 btn-sm" href="novo">Cadastrar Novo Cliente</a>
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>NOME</th>
          <th>Editar</th>
          <th>Excluir</th>
        </tr>
      </thead>
      <tbody>
      @foreach($clientes as $cliente)
      @if($cliente->ativo == true)
        <tr>
          <td>{{$cliente->id}}</td>
          <td>{{$cliente->nome}}</td>
   
          <td><a class="btn btn-warning btn-sm" href="editar/{{$cliente->id}}">Editar</a></td>
          <td><a class="btn btn-danger btn-sm" onclick="return confirm('Você deseja Excluir?')" href="excluir/{{$cliente->id}}">Excluir</a>  </td>
        </tr>
      @endif
      @endforeach        
      </tbody>
    </table>
    <a class="btn btn-success btn-sm"  href="{{url('compra/novo')}}" >Cadastrar Compra</a>
 @endsection