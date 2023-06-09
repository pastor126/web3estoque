@extends('template')

@section('conteudo')
<h4>Produtos</h4>
@auth
    <a class="btn btn-outline-primary mb-2 btn-sm" href="novo">Cadastrar</a>
@endauth
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tipo</th>
          <th>Data</th>
          <th>Produto</th>
          <th>Imagem</th>
          <th>Fabricante</th>
          <th>Quantidade</th>
          @auth
          <th>Custo</th>
          @endauth
          <th>Preço</th>
        
        </tr>
      </thead>
      <tbody>
          @foreach ($produtos as $produto)        
              @if($produto->ativo == true)
             
           
              <tr>
                <td>{{$produto->id}}</td>
                <td>{{$produto->tipo->nome_tipo}}</td>
                <td>{{$produto->data->format('d/m/Y')}}</td>
                <td>{{$produto->descricao}}</td>
                <td>
            @if($produto->figura != "")
              <img style="width:4rem;height:4rem;object-fit:contain" src="/storage/imagens/{{$produto->figura}}">
            @endif
          </td>

                <td>{{$produto->fabricante->nome}}</td>
                <td>{{$produto->qtde_estoque}}</td>
                @auth
                <td>{{$produto->valor_compra}}</td>
                @endauth
                <td>{{$produto->valor_venda}}</td>
        @auth
                <td><a class="btn btn-outline-warning btn-sm" href="editar/{{$produto->id}}">Editar</a></td>
                <td><a class="btn btn-outline-danger btn-sm" onclick="return confirm('Você deseja Excluir?')" href="excluir/{{$produto->id}}">Excluir</a></td>
        @endauth
              </tr>
              @endif
         @endforeach
      </tbody>
    </table>
    @endsection