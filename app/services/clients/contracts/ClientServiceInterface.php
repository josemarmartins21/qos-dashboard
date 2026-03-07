<?php

namespace App\services\clients\contracts;

use App\Models\Client;

interface ClientServiceInterface {
    public function save($client = [], $relation = []) : array | string;
    public function getAll() : array;
    public function delete(int $id) : bool;
    public function get(int $id): Client;
    public function update(array $client): Client;
}