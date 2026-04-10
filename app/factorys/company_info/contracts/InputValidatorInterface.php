<?php

namespace App\factorys\company_info\contracts;

use Illuminate\Http\Request;

interface InputValidatorInterface
{
    public function validate(Request $request);
}