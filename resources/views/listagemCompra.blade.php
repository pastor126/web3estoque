@extends('template')

@section('conteudo')
<h4>Compras</h4>
    <a class="btn btn-primary mb-2 btn-sm" href="novo">Cadastrar Compra</a>
    <table class="table table-striped table-hover table-bordered">
    
    <thead>
        <tr>
          <th>ID</th>
          <th>Data</th>
          <th>Cliente</th>
          <th>Tipo</th>
          <th>Produto</th>
          <th>Fabricante</th>
          <th>Qtde</th>
          <th>Preço</th>
          <th>Total</th>
          <th>Forma Pag.</th>
          <th>Editar</th>
          <th>Excluir</th>
        </tr>
      </thead>
      <tbody>
        

         @foreach ($compras as $compra)
             <p style="display: none">{{ $data = date("d/m/Y",  strtotime($compra->data))}}</p>
            @php
             $compra->total = $compra->quantidade * $compra->preco;
            @endphp 
              <tr>
                <td>{{$compra->id}}</td>
                <td>{{$data}}</td>
                <td>{{$compra->cliente->nome}}</td> 
                <td>{{$compra->produto->tipo->nome_tipo}}</td> 
                <td>{{$compra->produto->descricao}}</td>
                <td>{{$compra->produto->fabricante->nome}}</td>
                <td>{{$compra->quantidade}}</td>
                <td>{{$compra->preco}}</td>
                <td>{{$compra->total}}</td>
                <td>{{$compra->forma_pag->tipo}}</td>
                <td><a class="btn btn-warning btn-sm" href="editar/{{$compra->id}}">Editar</a></td>
                <td><a class="btn btn-danger btn-sm" onclick="return confirm('Você deseja Excluir?')" href="excluir/{{$compra->id}}">Excluir</a></td>

              </tr>
         @endforeach
      </tbody>
    </table>
    <a class="btn btn-success btn-sm"  href="{{url('produto/listar')}}" >Estoque</a>
    @endsection