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
        $question = Question::where('id', $id)->where('is_active',false)->exists();
    
        if ($question === false) throw new \Exception("A pergunta frequente já se encontra activa");

        if ($this->validateAOrD->validateIfCanActive() === false) throw new InvalidArgumentException("Número máximo pergunta frequente activas foi atingido");    

        $question = Question::findOrFail($id)->update([
            'is_active' => true,
        ]);

        return $question;
    }

    public function disable(int $id): bool
    {
        $question = Question::where('id', $id)->where('is_active',true)->exists();
        
        if ($question === false) throw new \Exception("A pergunta frequente já se encontra desactivada");
        
        if ($this->validateAOrD->validateIfCanDisable() === false) throw new InvalidArgumentException("Número mínimo de pergunta frequente  activo foi atingido");  

        $question = Question::findOrFail($id)->update([
            'is_active' => false,
        ]);
        
        return $question;
    }
}