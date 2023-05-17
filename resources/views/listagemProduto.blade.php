@extends('template')

@section('conteudo')
<h4>Produtos</h4>
    <a class="btn btn-primary mb-2 btn-sm" href="novo">Cadastrar</a>
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tipo</th>
          <th>Data</th>
          <th>Produto</th>
          <th>Fabricante</th>
          <th>Quantidade</th>
          <th>Custo</th>
          <th>Preço</th>
          <th>Editar</th>
          <th>Excluir</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($produtos as $produto)        
              @if($produto->ativo == true)
                <td style="display: none"> {{$data = date("d/m/Y",  strtotime($produto->data))}}<td>
              @endif
              <tr>
                <td>{{$produto->id}}</td>
                <td>{{$produto->tipo->nome_tipo}}</td>
                <td>{{$data}}</td>
                <td>{{$produto->descricao}}</td>
                <td>{{$produto->fabricante->nome}}</td>
                <td>{{$produto->qtde_estoque}}</td>
                <td>{{$produto->valor_compra}}</td>
                <td>{{$produto->valor_venda}}</td>
                <td><a class="btn btn-warning btn-sm" href="editar/{{$produto->id}}">Editar</a></td>
                <td><a class="btn btn-danger btn-sm" onclick="return confirm('Você deseja Excluir?')" href="excluir/{{$produto->id}}">Excluir</a></td>
              </tr>
         @endforeach
      </tbody>
    </table>
    @endsection