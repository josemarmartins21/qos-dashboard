<?php

namespace App\factorys\class;

use App\factorys\contracts\ActivateDisableInterface;
use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\ClientProveSocial;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use InvalidArgumentException;

class ActivateDisableProveSocial implements ActivateDisableInterface {
    private ValidateIfCanActiveOrDisableInterface $validateAOrD;

    public function __construct()
    {
        $this->validateAOrD = ValidateIfCanActiveOrDisableFactory::create("prova social");
    }
    public function active(int $id): bool
    {

        $question = ClientProveSocial::where('id', $id)->where('is_active', false)->exists();
    
        if ($question === false) throw new \Exception("O registo de cliente renomado já se encontra activo");

        if ($this->validateAOrD->validateIfCanActive() === false) throw new InvalidArgumentException("Número máximo de registo de cliente renomado activo foi atingido");    

        $question = ClientProveSocial::findOrFail($id)->update([
            'is_active' => true,
        ]);

        return $question;
    }

    public function disable(int $id): bool
    {
        $question = ClientProveSocial::where('id', $id)->where('is_active', true)->exists();
        
        if ($question === false) throw new \Exception("O registo de cliente renomado já se encontra desactivado");
        
        if ($this->validateAOrD->validateIfCanDisable() === false) throw new InvalidArgumentException("Número mínimo de registo de cliente renomado  activo foi atingido");  

        $question = ClientProveSocial::findOrFail($id)->update([
            'is_active' => false,
        ]);
        
        return $question;
    }

}