<?php

namespace App\services\clients\contracts;

use App\Models\Client;

interface ClientServiceInterface {
    public function save($data = []) : array;
    public function getAll() : array;
    public function delete(int $id) : bool;
    public function get(int $id): Client;
}