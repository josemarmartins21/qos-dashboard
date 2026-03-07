<?php

namespace App\factorys;

use App\factorys\class\ActivateDisableFAQ;
use App\factorys\class\ActivateDisableProveSocial;
use App\factorys\class\ActivateDisableTestimony;
use App\factorys\contracts\ActivateDisableInterface;

class ActivateDisableFatory {
    public function create(string $type): ActivateDisableInterface
    {
        $activateOrDisable = match (strtolower($type)) {
            strtolower("pergunta frequente" ) => new ActivateDisableFAQ,
            strtolower("depoimento") => new ActivateDisableTestimony,
            strtolower("prova social") => new ActivateDisableProveSocial,
        };
        return $activateOrDisable;
    }
}