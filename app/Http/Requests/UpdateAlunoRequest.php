<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlunoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'  => 'required|string|max:255',
            'idade' => 'required|integer|min:1',
            'nota'  => 'required|numeric|min:0|max:10',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'  => 'O campo nome é obrigatório.',
            'idade.required' => 'Informe a idade.',
            'nota.required'  => 'Informe a nota.',
        ];
    }
}
