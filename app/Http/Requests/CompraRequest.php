<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
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
            'titulo' => 'required',
            'texto' => 'required',
            'data' => 'required',
            'categoria_id' => 'required|exists:categoria,id',
            'autor_id' => 'required|exists:autor,id',
          ];
      }
  
      public function messages(): array
      {
          return [
              'quantidade.required' => 'O campo quantidade deve ser preenchido',
              'cliente_id.required' => 'O campo cliente deve ser preenchido',
              'produto_id.required' => 'O campo Produto deve ser preenchido',
              'forma_pag_id.required' => 'O campo forma de pagamento deve ser preenchido',
          ];
      }
  }