<?php

namespace App\factorys\company_info;

use App\enums\company_infos\CompanyInfoEnum;
use App\factorys\company_info\contracts\InputValidatorInterface;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PhoneValidator implements InputValidatorInterface
{
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required|unique:' . CompanyInfo::class.'|string|max:13|min:9',
            'key' => 'required|string|' . Rule::in(CompanyInfoEnum::cases()),
        ], [
            'value.required' => 'O campo :attribute é obrigatório.',
            'value.max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'value.min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
        ], [
            'key' => CompanyInfoEnum::Phone->value,
            'value' => 'Valor do telefone',
        ]);

        return $validator;
    }
}

