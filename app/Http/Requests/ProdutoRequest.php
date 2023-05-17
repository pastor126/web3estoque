<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'descricao' => 'required',
            'qtde_estoque' => 'required',
            'valor_venda' => 'required',
            'fabricante_id' => 'required|exists:fabricante,id',
            'tipo_id' => 'required|exists:tipo,id',
          ];
      }
  
      public function messages(): array
      {
          return [
              'descricao.required' => 'O campo descrição deve ser preenchido',
              'qtde_estoque.required' => 'O campo estoque deve ser preenchido',
              'valor_venda.required' => 'O campo preço deve ser preenchido',
              'fabricante_id.required' => 'O campo fabricante deve ser preenchido',
              'tipo_id.required' => 'O campo tipo deve ser preenchido',
          ];
      }
  }
