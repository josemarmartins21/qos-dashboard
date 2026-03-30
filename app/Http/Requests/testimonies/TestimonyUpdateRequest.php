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
            'client_id' => ['required', 'integer', 'exists:clients,id', 'min:1', 'numeric'],
            'testimony' => ['required', 'string',],
        ];
    }

    public function attributes()
    {
        return [
            'testimony' => 'depoimento',
            'client_id' => 'cliente',
        ];
    }
}
