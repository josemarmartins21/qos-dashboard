<?php

namespace App\Http\Requests\activatedisable;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActivateDisableRequest extends FormRequest
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
            'type' => ['required','string','max:40',Rule::in(["pergunta frequente","depoimento","prova social"])],
            'id' => ['required','integer','numeric','min:1'],
        ];
    }

    public function attributes()
    {
        return [
            "type" => "tipo de publicação",
        ];
    }
}
