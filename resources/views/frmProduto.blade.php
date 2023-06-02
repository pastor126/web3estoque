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

  @if ($produto->figura != "")
    <img style="width:150px;height:150px;object-fit:cover;border-radius:20px;border:1px solid gray;padding: 0.25rem" src="{{ Storage::url('imagens/'.$produto->figura) }}">
@endif


<h4>Cadastro de Produto</h4>
<form action="{{url('produto/salvar')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input readonly type="text" class="form-control" id="id" value="{{$produto->id}}" name="id">
  </div>

  <div class="mb-3">
      <label for="nome_tipo" class="form-label">Tipo</label>
      <select class="form-select  @error('cliente_id') is-invalid @enderror"  name="tipo_id" id="tipo_id">
        @foreach($tipos as $tipo)
        @if($tipo->ativo == true)
          <option {{$tipo->id==old('tipo_id',$produto->tipo_id)? 'selected':''}} value="{{$tipo->id}}">{{$tipo->nome_tipo}}</option>
        @endif
        @endforeach
      </select>
        @error('tipo_id')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </select>
  </div>

  <div class="mb-3">
      <label for="descricao" class="form-label">Produto</label>
      <input type="text" class="form-control" id="descricao" value="{{$produto->descricao}}" name="descricao">
  </div>


  <div class="mb-3">
          <label for="arquivo" class="form-label">Figura</label>
          <input type="file" class="form-control" id="arquivo" name="arquivo" accept="image/*" >
      </div>

  <div class="mb-3">
      <label for="qtde_estoque" class="form-label">Estoque</label>
      <input type="text" class="form-control" id="qtde_estoque" value="{{$produto->qtde_estoque}}" name="qtde_estoque">
  </div>

  <div class="mb-3">
      <label for="valor_compra" class="form-label">Custo</label>
      <input type="text" class="form-control" id="valor_compra" value="{{$produto->valor_compra}}" name="valor_compra">
  </div>

  <div class="mb-3">
      <label for="valor_venda" class="form-label">Preço</label>
      <input type="text" class="form-control" id="valor_venda" value="{{$produto->valor_venda}}" name="valor_venda">
  </div>

  <div class="mb-3">
      <label for="fabricante" class="form-label">Fabricante</label>
      <select class="form-select  @error('cliente_id') is-invalid @enderror"  name="fabricante_id" id="fabricante_id">
        @foreach($fabricantes as $fabricante)
          <option {{$fabricante->id==old('fabricante_id',$produto->fabricante_id)? 'selected':''}} value="{{$fabricante->id}}">{{$fabricante->nome}}</option>
        @endforeach
      </select>
        @error('fabricante_id')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </select> 
  </div>


  <button class="btn btn-outline-primary btn-sm" type="submit" name="button">Salvar</button>
  <a class="btn btn-outline-success btn-sm"  href="{{url('produto/listar')}}" >Voltar</a>
</form>
@endsection