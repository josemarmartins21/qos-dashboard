<?php

namespace App\services\validators;

use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;

class ValidateIfCanActiveOrDisable implements ValidateIfCanActiveOrDisableInterface {
    public function __construct(
        private int $maxActive,
        private int $minDisable,
        private int $quantityActiveResource,
    ){}

    public function validateIfCanActive(): bool
    {
        return $this->getQuantityActive() < $this->maxActive ? true : false;
    }

    public function validateIfCanDisable(): bool
    {
        return $this->getQuantityActive() > $this->minDisable ? true :  false;
    }

    public function getQuantityActive()
    {
        return $this->quantityActiveResource;
    }
}