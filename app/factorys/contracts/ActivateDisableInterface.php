<?php

namespace App\factorys\contracts;


interface ActivateDisableInterface {
    public function active(int $id): bool;
    public function disable(int $id): bool; 
}