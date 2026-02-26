<?php

namespace App\factorys;

use App\factorys\contracts\TestimonySocialProveInterface;
use App\services\clientprovesocial\ClientProveSocialService;
use App\services\testimonys\TestimonyService;

class TestimonySocialProveFactory  {
    public function create(string $type): TestimonySocialProveInterface
    {
        $result = match ($type) {
            "depoimento" => new TestimonyService,
            "prova social" => new ClientProveSocialService(),
        };

        return $result;
    }
}