<?php

namespace App\factorys;

use App\factorys\contracts\TestimonySocialProveInterface;
use App\services\clientprovesocial\ClientProveSocialService;
use App\services\testimonys\TestimonyService;

class TestimonySocialProveFactory  {
    public static function create(string $type): TestimonySocialProveInterface
    {
        $result = match (strtolower($type)) {
            strtolower("depoimento") => new TestimonyService(),
            
            strtolower("prova social"), 
            strtolower("cliente renomado") => new ClientProveSocialService(),
        };

        return $result;
    }
}