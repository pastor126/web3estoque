<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use App\Models\Tipo;
use App\Models\Produto;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class ProdutoController extends Controller
{
    function listar() {
        $produtos = Produto::orderBy('descricao')->get();
        return view('listagemProduto', compact('produtos'));
      }
  
      function novo() {
        $produto = new Produto();
        $produto->id = 0;
        $produto->data = now();
        $fabricantes = Fabricante::orderBy('nome')->get();
        $tipos = Tipo::orderBy('nome_tipo')->get();
        return view("frmProduto", compact('produto', 'fabricantes', 'tipos'));
      }
  
      function salvar(ProdutoRequest $request) {
        if ($request->input('id') == 0) {
          $produto = new Produto();
        } else {
          $produto = Produto::find($request->input('id'));
        }
        if ($request->hasFile('arquivo')) {
          $arquivo = $request->file('arquivo');
          $arquivoSalvo = $arquivo->store('public/imagens');
          $arquivoSalvo = explode("/", $arquivoSalvo);
          $tamanho = count($arquivoSalvo);
          if ($produto->figura != "") {
            Storage::delete("public/imagens/$produto->figura");
          }
          $produto->figura = $arquivoSalvo[$tamanho-1];
        }
  
        $produto->data = $request->input('data');
        $produto->descricao = $request->input('descricao');
        $produto->qtde_estoque = $request->input('qtde_estoque');
        $produto->valor_compra = $request->input('valor_compra');
        $produto->valor_venda = $request->input('valor_venda');
        $produto->fabricante_id = $request->input('fabricante_id');
        $produto->tipo_id = $request->input('tipo_id');
        
        if($produto->id ==0){
            $produto->save();
        }
        else{
            $produto->update();
        }
        
        return redirect('produto/listar');
      }
  
      function salvarOld(Request $request) {
        $validated = $request->validate([
                'descricao' => 'required',
                'qtde_estoque' => 'required',
                'valor_venda' => 'required',
                'fabricante_id' => 'required|exists:fabricante,id',
                'tipo_id' => 'required|exists:tipo,id',
            ]);
  
        if ($request->input('id') == 0) {
          $produto = new Produto();
        } else {
          $produto = Produto::find($request->input('id'));
        }
       
        $produto->data = $request->input('data');
        $produto->descricao = $request->input('descricao');
        $produto->qtde_estoque = $request->input('qtde_estoque');
        $produto->valor_compra = $request->input('valor_compra');
        $produto->valor_venda = $request->input('valor_venda');
        $produto->fabricante_id = $request->input('fabricante_id');
        $produto->tipo_id = $request->input('tipo_id');

        if($produto->id ==0){
            $produto->save();
        }
        else{
            $produto->update();
        }
        return redirect('produto/listar');
      }
  
      function editar($id) {
        $produto = produto::find($id);
      
        $fabricantes = Fabricante::orderBy('nome')->get();
        $tipos = Tipo::orderBy('nome_tipo')->get();

        return view("frmProduto", compact('produto', 'fabricantes', 'tipos'));
      }
  
      function excluir($id) {
        $produto = produto::find($id);
        $fabricante = Fabricante::find($produto->fabricante_id);
        $tipo = Tipo::find($produto->tipo_id);
        $produto->ativo = false;
     
        $produto->update();

        return redirect('produto/listar');
      }
  }
  

