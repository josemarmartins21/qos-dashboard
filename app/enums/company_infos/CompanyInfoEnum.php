<?php

namespace App\enums\company_infos;

enum CompanyInfoEnum: string
{
    case Email = 'email da empresa';  
    case Phone = 'telefone principal da empresa';
    case Logotipo = 'logotipo da empresa';
    case HeroImage = 'banner (hero) do site';
    case Sobre = 'sobre a empresa';
    case Whatsapp = 'whatsapp da empresa';
}