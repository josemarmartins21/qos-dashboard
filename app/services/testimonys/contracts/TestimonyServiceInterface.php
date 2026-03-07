<?php

namespace App\services\testimonys\contracts;

interface TestimonyServiceInterface {
    public function getAll(): array;
    public function get(int $id): array;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}