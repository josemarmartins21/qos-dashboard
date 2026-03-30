<?php

namespace App\Http\Requests\questions;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question' => ['bail','required','string','max:300'],
            'response' => ['bail','required','string','max:300'],
            'is_active' => ['bail','required','boolean','min:0','max:1'],
        ];
    }

    public function attributes()
    {
        return [
            'question' => 'pergunta',
            'response' => 'resposta',
            'is_active' => 'activo',
        ];
    }
}
