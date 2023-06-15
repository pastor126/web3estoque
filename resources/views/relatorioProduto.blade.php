<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
      }
      body {
        width: 80%;
        margin: auto;
      }
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th,td {
        border: 1px solid black;
        padding: 0.5rem;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>Relatório de Estoque</h1>
    <table>
      <thead>
        <tr>
          <th>Incluído</th>
          <th>Produto</th>
          <th>Imagem</th>
          <th>Tipo</th>
          <th>Fabricante</th>
          <th>Custo</th>
          <th>Preço</th>
          <th>Qtde Estoque</th>
        </tr>
      </thead>
      <tbody>
        @foreach($produtos as $produto)
        @if($produto->ativo == true)
          <tr>
            <td>{{$produto->data->format('d/m/Y')}}</td>
            <td>{{$produto->descricao}}</td>
            <td>
              @if($produto->figura != "")
                <img style="width:50px;height:50px;object-fit:cover" src='{{storage_path("app/public/imagens/$produto->figura") }}'>
              @endif
            </td>
            <td>{{$produto->tipo->nome_tipo}}</td>
            <td>{{$produto->fabricante->nome}}</td>
            <td>{{$produto->valor_compra}}</td>
            <td>{{$produto->valor_venda}}</td>
            <td>{{$produto->qtde_estoque}}</td>
          </tr>
        @endif
        @endforeach
      </tbody>
    </table>

  </body>
</html>