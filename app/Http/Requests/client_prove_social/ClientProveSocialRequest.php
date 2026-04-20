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
            'image' => ['bail','required','max:2048', 'image','file', 'mimes:jpg,png,jpeg'],
            'url' => ['bail','required' ,'url','unique:client_prove_socials,url',/* 'exists:client_prove_socials,url' */],
            'name' => ['bail','required', 'string', 'max:100', 'min:4'],
            'company_role' => ['bail','required', 'string', 'max:100'],
            'is_active' => ['required','integer','numeric','min:0','max:1'],
            'type' => ['bail','required','string','max:50', Rule::in(['cliente renomado'])],
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'Logo da empresa',
            'url' => 'página/site da empresa',
            'is_active' => 'estado',
            'name' => 'nome do cliente',
            'company_role' => 'nome da empresa',
        ];
    }
}
