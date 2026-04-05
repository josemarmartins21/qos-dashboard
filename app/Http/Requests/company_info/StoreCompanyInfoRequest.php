<?php

namespace App\Http\Requests\company_info;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyInfoRequest extends FormRequest
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
            'value' => 'string|required|max:2048',
            'key' => 'string|required|max:50',
        ];
    }

    public function attributes()
    {
        return [
            'value' => 'valor',
            'key' => 'detalhe',
        ];
    }
}
