<?php

namespace App\services\clientprovesocial\contracts;

interface ClientProveSocialInterface {
    public function getAll(?string $search = '');
    public function get(int $id): array;
    public function delete(int $id) : bool;
    public function update(int $id, $data = []): array;
}