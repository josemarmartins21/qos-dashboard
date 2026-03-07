<?php

namespace App\factorys;

use App\Models\ClientProveSocial;
use App\Models\Question;
use App\Models\Testimony;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use App\services\validators\ValidateIfCanActiveOrDisable;

class ValidateIfCanActiveOrDisableFactory {
    /**
     * Fabrica objectos que validam 
     * se determinado post/publicação na página pode 
     * ser desactivada.
     * @param string $type
     * 
     * @return ValidateIfCanActiveOrDisableInterface
     */
    public static function create(string $type): ValidateIfCanActiveOrDisableInterface
    {
        $validateIfCanActiveOrDisable = match (strtolower($type)) {

            strtolower('prova social'), strtolower('cliente renomado') => new ValidateIfCanActiveOrDisable(
                ClientProveSocial::getMaxActive(), 
                ClientProveSocial::getMinActive(), 
                ClientProveSocial::getQuantityActive()
            ),

            strtolower('depoimento') => new ValidateIfCanActiveOrDisable(
                Testimony::getMaxActive(), 
                Testimony::getMinActive(), 
                Testimony::getQuantityActive()
            ),

            strtolower('faq'), strtolower('pergunta frequente') => new ValidateIfCanActiveOrDisable(
                Question::getMaxActive(), 
                Question::getMinActive(), 
                Question::getQuantityActive()
            ),
        };

        return $validateIfCanActiveOrDisable;
    }
}