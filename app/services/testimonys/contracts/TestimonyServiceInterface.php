<?php

namespace App\services\testimonys\contracts;

interface TestimonyServiceInterface {
    public function save($data = []) : array;
    public function getWithClient(): array;
    public function delete(int $id): bool;
    public function get(int $id): array;
    public function update(int $id, array $data): bool;
}