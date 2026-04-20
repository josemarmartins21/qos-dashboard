<?php

namespace App\factorys\class;

use App\factorys\contracts\ActivateDisableInterface;
use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\Question;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use InvalidArgumentException;

class ActivateDisableFAQ implements ActivateDisableInterface {
    private ValidateIfCanActiveOrDisableInterface $validateAOrD;

    public function __construct()
    {
        $this->validateAOrD = ValidateIfCanActiveOrDisableFactory::create("faq");
    }
    
    public function active(int $id): bool
    {
        if ($this->validateAOrD->validateIfCanActive() === false) throw new InvalidArgumentException("Número máximo pergunta frequente activas foi atingido");    

        $question = Question::findOrFail($id)->update([
            'is_active' => true,
        ]);

        return $question;
    }

    public function disable(int $id): bool
    {
        $question = Question::where('id', $id)->where('is_active', true)->exists();


        if (
            $this->validateAOrD->validateIfCanDisable() === false
            AND $question === true
        ) 
            throw new InvalidArgumentException("Não foi possível eliminar o depoimento, pois o número mínimo de perguntas frequentes será ultrapassado.");  

        $question = Question::findOrFail($id)->update([
            'is_active' => false,
        ]);
        
        return $question;
    }
}