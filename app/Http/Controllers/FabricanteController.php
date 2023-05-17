<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fabricante;

class FabricanteController extends Controller
{
   function listar() {
    $fabricantes = Fabricante::orderBy('nome')->get();
    return view('listagemFabricantes',
      compact('fabricantes') );
  }

  function novo() {
    $fabricante = new Fabricante();
    $fabricante->id = 0;
    return view('frmFabricante',
      compact('fabricante'));
  }

  function salvar(Request $request) {
    if ($request->input('id') == 0) {
      $fabricante = new Fabricante();
    } else {
      $fabricante = Fabricante::find($request->input('id'));
    }  

    $fabricante->nome = $request->input('nome');
    $fabricante->cnpj = $request->input('cnpj');
    $fabricante->save();
    return redirect('fabricante/listar');
  }

  function editar($id) {
    $fabricante = Fabricante::find($id);
    return view('frmFabricante',
      compact('fabricante'));
  }

  function excluir($id) {
    $fabricante = Fabricante::find($id);
    $fabricante->ativo = false;
    $fabricante->update();
    return redirect('Fabricante/listar');
  }

}
