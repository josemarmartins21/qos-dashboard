<?php

namespace App\services\validators\contracts;

interface ValidateIfCanActiveOrDisableInterface {
    public function validateIfCanActive(): bool;
    public function validateIfCanDisable(): bool; 
}