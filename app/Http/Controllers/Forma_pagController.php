<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forma_pag;

class Forma_pagController extends Controller
{
    function listar() {
        $forma_pags = Forma_pag::orderBy('tipo')->get();
        return view('listagemForma_pag',
          compact('forma_pags') );
      }
    
      function novo() {
        $forma_pag = new Forma_pag();
        $forma_pag->id = 0;
        return view('frmForma_pag',
          compact('forma_pag'));
      }
    
      function salvar(Request $request) {
        if ($request->input('id') == 0) {
          $forma_pag = new Forma_pag();
        } else {
          $forma_pag = Forma_pag::find($request->input('id'));
        }  
    
        $forma_pag->tipo = $request->input('tipo');
        $forma_pag->save();
        return redirect('forma_pag/listar');
      }
    
      function editar($id) {
        $forma_pag = Forma_pag::find($id);
        return view('frmForma_pag',
          compact('forma_pag'));
      }
    
      function excluir($id) {
        $forma_pag = Forma_pag::find($id);
        $forma_pag->ativo = false;
        $forma_pag->update();
        return redirect('forma_pag/listar');
      }
    
    }
    
