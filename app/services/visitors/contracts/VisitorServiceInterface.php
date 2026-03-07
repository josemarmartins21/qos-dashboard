<?php

namespace App\services\visitors\contracts;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Collection;

interface VisitorServiceInterface
{
    public function getAll(): Collection;
    public function create($visitor = [], $message = []);
    public function delete(int $id): bool; 
    public function get(int $id);
}