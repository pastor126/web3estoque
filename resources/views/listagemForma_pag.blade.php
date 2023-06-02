@extends('template')

@section('conteudo')
<h4>Formas de pagamento</h4>
    <a class="btn btn-outline-primary mb-2 btn-sm" href="novo">Cadastrar forma de pagamento</a>
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
      @foreach($forma_pags as $forma_pag)
      @if($forma_pag->ativo == true)
        <tr>
          <td>{{$forma_pag->id}}</td>
          <td>{{$forma_pag->tipo}}</td>
   
          <td><a class="btn btn-outline-warning btn-sm" href="editar/{{$forma_pag->id}}">Editar</a></td>
          <td><a class="btn btn-outline-danger btn-sm" onclick="return confirm('Você deseja Excluir?')" href="{{url('excluir/$forma_pag->id')}}">Excluir</a>  </td>
        </tr>
      @endif
      @endforeach        
      </tbody>
    </table>

    <a class="btn btn-success btn-sm"  href="{{url('produto/listar')}}" >Estoque</a>
    @endsection