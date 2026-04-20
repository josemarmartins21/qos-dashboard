<?php

namespace App\factorys\class;

use App\factorys\contracts\ActivateDisableInterface;
use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\Testimony;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use InvalidArgumentException;

class ActivateDisableTestimony implements ActivateDisableInterface 
{
    private ValidateIfCanActiveOrDisableInterface $validateAOrD;

    public function __construct()
    {
        $this->validateAOrD = ValidateIfCanActiveOrDisableFactory::create("depoimento");
    }
    public function active(int $id): bool
    {        
        if ($this->validateAOrD->validateIfCanActive() === false) throw new InvalidArgumentException("Número máximo de depoimento activo foi atingido");    

        $testimony = Testimony::findOrFail($id)->update([
            'is_active' => true,
        ]);

        return $testimony;
    }

    public function disable(int $id): bool
    {
        $testimony = Testimony::where('id', $id)->where('is_active', true)->exists();


        if (
            $this->validateAOrD->validateIfCanDisable() === false
            AND $testimony === true
        ) 
            throw new InvalidArgumentException("Número mínimo de depoimento activo foi atingido");  

        $testimony = Testimony::findOrFail($id)->update([
            'is_active' => false,
        ]);
        
        return $testimony;
    }

}