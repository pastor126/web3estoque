@extends('template')

@section('conteudo')
<h4>Cadastrar Fabricante</h4>
    <form action="{{url('fabricante/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input readonly type="text" class="form-control" id="id" value="{{$fabricante->id}}" name="id">
      </div>
      <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" value="{{$fabricante->nome}}" name="nome">
      </div>

      <div class="mb-3">
          <label for="cnpj" class="form-label">CNPJ</label>
          <input type="text" class="form-control" id="cnpj" value="{{$fabricante->cnpj}}" name="cnpj">
      </div>

      <button class="btn btn-primary btn-sm" type="submit" name="button">Salvar</button>
      <a class="btn btn-success btn-sm"  href="{{url('fabricante/listar')}}" >Voltar</a>
    </form>
    @endsection