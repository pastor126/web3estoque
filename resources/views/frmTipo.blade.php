@extends('template')

@section('conteudo')
<h4>Cadastrar Tipo</h4>
    <form action="{{url('tipo/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input readonly type="text" class="form-control" id="id" value="{{$tipo->id}}" name="id">
      </div>
      <div class="mb-3">
          <label for="nome_tipo" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" value="{{$tipo->nome_tipo}}" name="nome_tipo">
      </div>

      <button class="btn btn-primary btn-sm" type="submit" name="button">Salvar</button>
      <a class="btn btn-success btn-sm"  href="{{url('tipo/listar')}}" >Voltar</a>
    </form>
    @endsection