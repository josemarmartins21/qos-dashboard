<?php
namespace App\services\users\contracts;

interface UserServiceInterface
{
    public function getAll(?string $search = '');
}