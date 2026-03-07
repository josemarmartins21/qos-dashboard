<?php

namespace App\services\validators;

use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;

class ValidateIfCanActiveOrDisable implements ValidateIfCanActiveOrDisableInterface {
    public function __construct(
        private int $minActive,
        private int $minDisable,
        private int $quantityActiveResource,
    ){}

    public function validateIfCanActive(): bool
    {
        if ($this->getQuantityActive() < $this->minActive) return true;
        return false;
    }

    public function validateIfCanDisable(): bool
    {
        if ($this->getQuantityActive() > $this->minDisable) return true;
        return false;
    }

    public function getQuantityActive()
    {
        return $this->quantityActiveResource;
    }
}