<?php

namespace App\Http\Requests\testimonies;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TestimonyRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'company_role' => ['required', 'string', 'max:100'],
            'type' => ['required', 'string', 'max:100'],
            'testimony' => ['required', 'string', 'max:500'],
            'is_active' => ['boolean', 'min:0', 'max:1','integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo :attribute é obrigatório.',
            'company_role.required' => 'O campo :attribute é obrigatório.',
            'testimony.required' => 'O campo :attribute é obrigatório.',
            'is_active.boolean' => 'O campo :attribute deve ser selecionado.',
            
        ];
    }

    public function attributes()
    {
        return [
            'testimony' => 'depoimento',
            'company_role' => 'cargo na empresa',
            'name' => 'nome',
            'is_active' => 'estado',
        ];
    }
}
