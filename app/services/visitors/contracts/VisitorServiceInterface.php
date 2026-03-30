<?php

namespace App\services\visitors\contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface VisitorServiceInterface
{
    public function getAll(): LengthAwarePaginator;
    public function create($visitor = [], $message = []);
    public function delete(int $id): bool; 
    public function get(int $id);
}