<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Forma_pag;
use App\Http\Requests\CompraRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    function listar() {
        $compras = Compra::orderBy('data')->get();
        return view('listagemCompra', compact('compras'));
      }
  
      function novo() {
        $Compra = new Compra();
        $Compra->id = 0;
        $Compra->data = now();
        $clientes = Cliente::orderBy('nome')->get();
        $produtos = Produto::orderBy('descricao')->get();
        $forma_pag = Forma_pag::orderBy('tipo')->get();
        return view("frmCompra", compact('compra', 'clientes', 'produtos', 'forma_pag'));
      }
  
      function salvar(CompraRequest $request) {
        if ($request->input('id') == 0) {
          $compra = new Compra();
        } else {
          $compra = Compra::find($request->input('id'));
        }
        
  
        $compra->data = $request->input('data');
        $compra->quantidade = $request->input('quantidade');
        $compra->preco = $request->input('preco');
        $compra->produto_id = $request->input('produto_id');
        $compra->cliente_id = $request->input('cliente_id');
        $compra->forma_pag_id = $request->input('forma_pag_id');
        
        $produto = Produto::find($request->input('produto_id'));
        $produto->qtde_estoque = $produto->qtde_estoque - $compra->quantidade;
        $produto->update();

        if($compra->id ==0){
            $compra->save();
        }
        else{
            $compra->update();
        }
        
        return redirect('compra/listar');
      }
  
      function salvarOld(Request $request) {
        $validated = $request->validate([
                'quantidade' => 'required',
                'preco' => 'required',
                'produto_id' => 'required|exists:produto,id',
                'cliente_id' => 'required|exists:cliente,id',
                'forma_pag_id' => 'required|exists:forma_pag,id',
            ]);
  
        if ($request->input('id') == 0) {
          $compra = new compra();
        } else {
          $compra = compra::find($request->input('id'));
        }
       
        $compra->quantidade = $request->input('quantidade');
        $compra->preco = $request->input('preco');
        $compra->produto_id = $request->input('produto_id');
        $compra->cliente_id = $request->input('cliente_id');
        $compra->forma_pag_id = $request->input('forma_pag_id');

        $produto = Produto::find($request->input('produto_id'));
        $produto->qtde_estoque = $produto->qtde_estoque - $compra->quantidade;
        $produto->update();

        if($compra->id ==0){
            $compra->save();
        }
        else{
            $compra->update();
        }
        return redirect('compra/listar');
      }
  
      function editar($id) {
        $compra = Compra::find($id);

        $quant2 = $compra->quantidade - $compra->quant1;
        $produto = Produto::find($compra->produto_id);
        if($produto->ativo == true){
            $produto->qtde_estoque = $produto->qtde_estoque + $quant2;
        }
        else{
            $produto->ativo = true;
            $produto->qtde_estoque = $compra->quantidade;
        }
        $produto->update();
        
        $clientes = Cliente::orderBy('nome')->get();
        $produtos = Produto::orderBy('descricao')->get();
        $forma_pag = Forma_pag::orderBy('tipo')->get();
        return view("frmCompra", compact('compra', 'clientes', 'produtos', 'forma_pag'));
      }
  
      function excluir($id) {
        $compra = compra::find($id);
        $produto = Produto::find($compra->produto_id);
        if($produto->ativo == true){
            $produto->qtde_estoque = $produto->qtde_estoque + $compra->quantidade;
        }
        else{
            $produto->ativo = true;
            $produto->qtde_estoque = $compra->quantidade;
        }
        $produto->update();

        $compra->delete();
        return redirect('compra/listar');
      }
  }
  
