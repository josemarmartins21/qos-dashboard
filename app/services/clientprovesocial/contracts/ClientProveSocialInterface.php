<?php

namespace App\services\clientprovesocial\contracts;



use App\Models\Client;

interface ClientProveSocialInterface {
/*     public function save($data = []) : array; */
    public function getAll() : array;
/*     public function delete(int $id) : bool;
    public function get(int $id): Client;
    public function update(int $id, array $client): Client; */
}