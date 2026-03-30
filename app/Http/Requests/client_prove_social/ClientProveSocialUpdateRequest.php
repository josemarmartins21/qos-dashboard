<?php

namespace App\Http\Requests\client_prove_social;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ClientProveSocialUpdateRequest extends FormRequest
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
            'logo' => ['bail','nullable','max:2048','image'],
            'url' => ['bail','required' ,'url',/* 'unique:client_prove_socials,url', */],
            'name' => ['bail','required', 'string', 'max:100', 'min:4'],
            'company_role' => ['bail','required', 'string', 'max:100', 'min:4'],
            'client_id' => ['required','integer','numeric','min:1',],
        ];
    }

    public function attributes()
    {
        return [
            'logo' => 'logotipo',
            'url' => 'link',
            'client_name' => 'nome do cliente',
            'company_role' => 'nome da empresa',
        ];
    }
}
