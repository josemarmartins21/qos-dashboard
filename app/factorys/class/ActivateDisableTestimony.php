<?php

namespace App\factorys\class;

use App\factorys\contracts\ActivateDisableInterface;
use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\Testimony;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use InvalidArgumentException;

class ActivateDisableTestimony implements ActivateDisableInterface {
    private ValidateIfCanActiveOrDisableInterface $validateAOrD;

    public function __construct()
    {
        $this->validateAOrD = ValidateIfCanActiveOrDisableFactory::create("depoimento");
    }
    public function active(int $id): bool
    {        
        $testimony = Testimony::where('id', $id)->where('is_active',false)->exists();
    
        if ($testimony === false) throw new \Exception("Este testemunho já se encontra activo");

        if ($this->validateAOrD->validateIfCanActive() === false) throw new InvalidArgumentException("Número máximo de depoimento activo foi atingido");    

        $testimony = Testimony::findOrFail($id)->update([
            'is_active' => true,
        ]);

        return $testimony;
    }

    public function disable(int $id): bool
    {
        $testimony = Testimony::where('id', $id)->where('is_active',true)->exists();
        if ($testimony === false) throw new \Exception("Este testemunho já se encontra desactivado");
        
        if ($this->validateAOrD->validateIfCanDisable() === false) throw new InvalidArgumentException("Número mínimo de depoimento activo foi atingido");  

        $testimony = Testimony::findOrFail($id)->update([
            'is_active' => false,
        ]);
        
        return $testimony;
    }

}