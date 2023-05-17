@extends('template')

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif



<h5>Cadastro de Compras</h5>
<form action="{{url('compra/salvar')}}" method="post" enctype="multipart/form-data">
@csrf

  <div class="mb-3">
    <label for="id" class="form-label">ID</label>
    <input readonly type="text" class="form-control" id="id" value="{{$compra->id}}" name="id">
  </div>

  <div class="mb-3">
    <label for="nome" class="form-label" >Cliente</label>
  <div  style="display: flex; align-items: center;">
    <select  style="width: 85%;" class="form-select  @error('cliente_id') is-invalid @enderror" id="cliente_id" name="cliente_id">
        @foreach($clientes as $cliente)
          <option {{$cliente->id==old('cliente_id',$compra->cliente_id)? 'selected':''}} value="{{$cliente->id}}">{{$cliente->nome}}</option>
        @endforeach
      </select>
  

    <a class="btn btn-success ms-3"  href="{{url('cliente/listar')}}" >Novo Cliente</a>
    </div>  
  </div>


  <div class="mb-3">
    <label for="descricao" class="form-label" >Produto</label>
    <div  style="display: flex; align-items: center;">
    <select style="width: 35%;" class="form-select  @error('produto_id') is-invalid @enderror" name="produto_id" id="produto_id">
    @foreach($produtos as $produto)
    <option {{$produto->id==old('produto_id',$compra->produto_id)? 'selected':''}} value="{{$produto->id}}">{{$produto->descricao}} </option>
    @endforeach
      </select>

      <label style="width: 15%; padding: 1rem">Preço    R$</label>
      <input readonly style="border: none; padding: 0;" type="text" class="form-control" id="preco" value="" name="preco">
</div>
    </div>
<script>
    // Função para atualizar o preço quando a página é carregada
    function atualizarPreco() {
      var produtoId = document.querySelector('#produto_id').value;
      var preco = 0;

      @foreach($produtos as $produto)
        if ({{$produto->id}} == produtoId) {
          preco = {{$produto->valor_venda}};
        }
      @endforeach

      document.querySelector('#preco').value = preco;
    }

    // Chamar a função ao carregar a página
    window.addEventListener('DOMContentLoaded', atualizarPreco);
  </script>

<script>
    document.querySelector('#produto_id').addEventListener('change', function() {
        var produtoId = this.value;
        var preco = 0;

        // Localizar o preço do produto selecionado com base no ID do produto
        @foreach($produtos as $produto)
            if ({{$produto->id}} == produtoId) {
                preco = {{$produto->valor_venda}};
            }
        @endforeach

        document.querySelector('#preco').value = preco;
    });
</script>

  
  <div class="mb-3">
    @php
    if($compra->id == 0){
    $compra->quantidade = 0;
    }else{
    $compra->quant1 = $compra->quantidade;
    }
    @endphp
    <label for="quantidade" class="form-label">Quantidade</label>
    <input type="text" class="form-control" id="quantidade" value="{{$compra->quantidade}}" name="quantidade">
    <input readonly type="text" class="form-control" id="quant1" value="{{$compra->quant1}}" name="quant1" style="display: none" >
  </div>
  @error('quantidade')
          <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="mb-3">
    <label for="forma_pag_id" class="forma-label" >Forma de Pagamento</label>
    <select class="form-select  @error('forma_pag_id') is-invalid @enderror" name="forma_pag_id" id="forma_pag_id">
    @foreach($forma_pags as $forma_pag)
    @if($forma_pag->ativo == true)
          <option {{$forma_pag->id==old('forma_pag_id',$compra->forma_pag_id)? 'selected':''}} value="{{$forma_pag->id}}">{{$forma_pag->tipo}}</option>
    @endif   
    @endforeach
      </select>
  </div>

  <button class="btn btn-primary btn-sm" type="submit" name="button">Salvar</button>
  <a class="btn btn-success btn-sm"  href="{{url('compra/listar')}}" >Voltar</a>

  <script>
  document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();

 
    var quantidade = parseInt(document.querySelector('#quantidade').value);
    var qtde_estoque = parseInt({{$produto->qtde_estoque}});
    var id = parseInt(document.querySelector('#id').value);
 
    if (quantidade > qtde_estoque){
      alert('Quantidade de compra maior do que a quantidade em estoque.'); 
    }else{
        this.submit();
    }  

    
    
  });
</script>
</form>
@endsection
