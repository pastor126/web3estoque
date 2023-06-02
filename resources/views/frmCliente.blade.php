@extends('template')

@section('conteudo')
<h4>Cadastrar Cliente</h4>
    <form action="{{url('cliente/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input readonly type="text" class="form-control" id="id" value="{{$cliente->id}}" name="id">
      </div>
      <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" value="{{$cliente->nome}}" name="nome">
      </div>

      <button class="btn btn-outline-primary btn-sm" type="submit" name="button">Salvar</button>
      <a class="btn btn-outline-success btn-sm"  href="{{url('compra/novo')}}" >Comprar</a>
    </form>
    @endsection