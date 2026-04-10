<?php

namespace App\factorys\company_info;

use App\enums\company_infos\CompanyInfoEnum;
use App\factorys\company_info\contracts\InputValidatorInterface;
use App\factorys\company_info\PhoneValidator;
use App\factorys\company_info\EmailValidator;
use App\factorys\company_info\SobreValidator;
use App\factorys\company_info\ImageValidator;

class InputValidatorFactory
{
    /**
     *  Cria uma instância do validador de entrada 
     *  com base na chave fornecida.
     */
    public static function create($key): InputValidatorInterface
    {
        return match ($key) {
            CompanyInfoEnum::Email->value => new EmailValidator(),
            CompanyInfoEnum::Phone->value, CompanyInfoEnum::Whatsapp->value => new PhoneValidator(),
            CompanyInfoEnum::Sobre->value => new SobreValidator(),
            CompanyInfoEnum::HeroImage->value, CompanyInfoEnum::Logotipo->value => new ImageValidator(),
            /* 
            CompanyInfo::Logotipo->value => ,
            CompanyInfo::HeroImage->value => ,
            CompanyInfo::Sobre->value => ,
            CompanyInfo::Whatsapp->value => , */
        };
    }
}