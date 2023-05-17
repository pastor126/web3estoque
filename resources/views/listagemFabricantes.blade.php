@extends('template')

@section('conteudo')
<h4>Fabricantes</h4>
    <a class="btn btn-primary mb-2 btn-sm" href="novo">Cadastrar</a>
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CNPJ</th>
          <th>Editar</th>
          <th>Excluir</th>
        </tr>
      </thead>
      <tbody>
  
          @foreach ($fabricantes as $fabricante) 
          @if($fabricante->ativo == true)
             <tr>
                <td>{{$fabricante->id}}</td>
                <td>{{$fabricante->nome}}</td>
                <td>{{$fabricante->cnpj}}</td>
                <td><a class="btn btn-warning btn-sm" href="editar/{{$fabricante->id}}">Editar</a></td>
                <td><a class="btn btn-danger btn-sm" onclick="return confirm('Você deseja Excluir?')" href="excluir/{{$fabricante->id}}">Excluir</a></td>
              </tr>
        @endif  
         @endforeach

      </tbody>
    </table>
    <a class="btn btn-success btn-sm"  href="produto/listar" >Estoque</a>
    @endsection  