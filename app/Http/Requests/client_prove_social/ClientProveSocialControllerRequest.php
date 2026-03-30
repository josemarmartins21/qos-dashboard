<?php

namespace App\Http\Requests\client_prove_social;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientProveSocialRequest extends FormRequest
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
            'logo' => ['bail','required','max:2048'],
            'url' => ['bail','required' ,'url','unique:client_prove_socials,url',/* 'exists:client_prove_socials,url' */],
            'client_name' => ['bail','required', 'string', 'max:100', 'min:4'],
            'company_role' => ['bail','required', 'string', 'max:100', 'min:4'],
            'is_active' => ['required','integer','numeric','min:0','max:1'],
            'type' => ['bail','required','string','max:50', Rule::in(['cliente renomado'])],
        ];
    }

    public function attributes()
    {
        return [
            'logo' => 'logotipo',
            'url' => 'link',
            'is_active' => 'estado',
            'client_name' => 'nome do cliente',
            'company_role' => 'nome da empresa',
        ];
    }
}
