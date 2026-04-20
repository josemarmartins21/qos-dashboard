<?php

namespace App\Http\Requests\testimonies;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TestimonyUpdateRequest extends FormRequest
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
            'testimony' => ['required', 'string', 'max:500'],
            'client_id' => ['required', 'exists:clients,id','integer', 'min:1'],
        ];
    }

    public function attributes()
    {
        return [
            'testimony' => 'depoimento',
            'name' => 'nome do cliente',
            'company_role' => 'cargo na empresa',
        ];
    }
}
