<?php

namespace App\factorys\class;

use App\factorys\contracts\ActivateDisableInterface;
use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\ClientProveSocial;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use InvalidArgumentException;

class ActivateDisableProveSocial implements ActivateDisableInterface {
    private ValidateIfCanActiveOrDisableInterface $activator;

    public function __construct()
    {
        $this->activator = ValidateIfCanActiveOrDisableFactory::create("prova social");
    }
    
    public function active(int $id): bool
    {
        if ($this->activator->validateIfCanActive() === false) throw new InvalidArgumentException("Número máximo de registo de cliente renomado activo foi atingido");    

        $proveSocial = ClientProveSocial::findOrFail($id)->update([
            'is_active' => true,
        ]);

        return $proveSocial;
    }

    public function disable(int $id): bool
    {
        $proveSocial = ClientProveSocial::where('id', $id)->where('is_active', true)->exists();
        
        if (
                $this->activator->validateIfCanDisable() === false 
                AND $proveSocial === true
            ) 
                throw new InvalidArgumentException("Número mínimo de registo de cliente renomado  activo foi atingido");  

        $proveSocial = ClientProveSocial::findOrFail($id)->update([
            'is_active' => false,
        ]);
        
        return $proveSocial;
    }

}