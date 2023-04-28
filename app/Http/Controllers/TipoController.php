<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    function listar() {
        $tipos = Tipo::orderBy('nome_tipo')->get();
        return view('listagemTipos',
          compact('tipos') );
      }
  
      function novo() {
        $tipo = new Tipo();
        $tipo->id = 0;
        return view('frmTipo',
          compact('tipo'));
      }
  
      function salvar(Request $request) {
        if ($request->input('id') == 0) {
          $tipo = new Tipo();
        } else {
          $tipo = Tipo::find($request->input('id'));
        }  
  
        $tipo->nome_tipo = $request->input('nome_tipo');
        $tipo->save();
        return redirect('tipo/listar');
      }
  
      function editar($id) {
        $tipo = Tipo::find($id);
        return view('frmTipo',
          compact('tipo'));
      }
  
      function excluir($id) {
        $tipo = Tipo::find($id);
        $tipo->delete();
        return redirect('tipo/listar');
      }
  
  }
