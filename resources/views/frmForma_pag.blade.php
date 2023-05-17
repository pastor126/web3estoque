@extends('template')

@section('conteudo')
<h4>Cadastrar Forma de Pagamento</h4>
    <form action="{{url('forma_pag/salvar')}}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input readonly type="text" class="form-control" id="id" value="{{$forma_pag->id}}" name="id">
      </div>
      <div class="mb-3">
          <label for="tipo" class="form-label">Tipo</label>
          <input type="text" class="form-control" id="tipo" value="{{$forma_pag->tipo}}" name="tipo">
      </div>

      <button class="btn btn-primary btn-sm" type="submit" name="button">Salvar</button>
      <a class="btn btn-success btn-sm"  href="{{url('forma_pag/listar')}}" >Voltar</a>
    </form>
    @endsection