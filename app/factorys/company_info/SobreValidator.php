<?php

namespace App\factorys\company_info;

use App\enums\company_infos\CompanyInfoEnum;
use App\factorys\company_info\contracts\InputValidatorInterface;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SobreValidator implements InputValidatorInterface
{
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required|string|max:2048',
            'key' => 'required|string|' . Rule::in(CompanyInfoEnum::cases()),
        ], [
            'value.required' => 'O campo :attribute é obrigatório.',
            'value.max' => 'O campo :attribute deve ter no máximo :max caracteres.',
        ], [
            'key' => CompanyInfoEnum::sobre->value,
            'value' => 'sobre',
        ]);

        return $validator;
    }
}

