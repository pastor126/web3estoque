<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    function listar() {
        $clientes = Cliente::orderBy('nome')->get();
        return view('listagemClientes',
          compact('clientes') );
      }
  
      function novo() {
        $cliente = new Cliente();
        $cliente->id = 0;
        return view('frmCliente',
          compact('cliente'));
      }
  
      function salvar(Request $request) {
        if ($request->input('id') == 0) {
          $cliente = new Cliente();
        } else {
          $cliente = Cliente::find($request->input('id'));
        }  
  
        $cliente->nome = $request->input('nome');
        $cliente->cpf = $request->input('cpf');
        $cliente->save();
        return redirect('cliente/listar');
      }
  
      function editar($id) {
        $cliente = Cliente::find($id);
        return view('frmCliente',
          compact('cliente'));
      }
  
      function excluir($id) {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect('cliente/listar');
      }
  
  }
