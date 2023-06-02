@extends('template')

@section('conteudo')
<h4>Tipo de Produto</h4>
    <a class="btn btn-outline-primary mb-2 btn-sm" href="novo">Cadastrar</a>
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tipo</th>
          <th>Editar</th>
          <th>Excluir</th>
        </tr>
      </thead>
      <tbody>
         @foreach ($tipos as $tipo)
           @if($tipo->ativo == true)
            <tr>
                <td>{{$tipo->id}}</td>
                <td>{{$tipo->nome_tipo}}</td>
                <td><a class="btn btn-outline-warning btn-sm" href="editar/{{$tipo->id}}">Editar</a></td>
                <td><a class="btn btn-outline-danger btn-sm" onclick="return confirm('Você deseja Excluir?')" href="excluir/{{$tipo->id}}">Excluir</a></td>
              </tr>
            @endif  
           @endforeach
      </tbody>
    </table>
    <a class="btn btn-success btn-sm"  href="{{url('produto/listar')}}" >Estoque</a>
    @endsection