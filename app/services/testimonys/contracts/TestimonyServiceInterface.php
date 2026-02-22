<?php

namespace App\services\testimonys\contracts;

use App\Models\Testimony;

interface TestimonyServiceInterface {
    public function save($data = []) : array;
    public function getAll(): array;
    public function delete(int $id): bool;
}