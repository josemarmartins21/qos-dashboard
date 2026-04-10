<?php

namespace App\factorys\company_info;

use App\enums\company_infos\CompanyInfoEnum;
use App\factorys\company_info\contracts\InputValidatorInterface;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EmailValidator implements InputValidatorInterface
{
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required|email|unique:' . CompanyInfo::class.'|string|max:50',
            'key' => 'required|string|' . Rule::in(CompanyInfoEnum::cases()),
        ]);

        return $validator;
    }
}

