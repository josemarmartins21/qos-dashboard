<?php

namespace App\services\messages\contracts;

use App\Models\Message;

interface MessageServiceInterface {
    /* public function getAll(): Message; */
    public function create($message = []): Message;
    public function delete(int $id): bool;
}