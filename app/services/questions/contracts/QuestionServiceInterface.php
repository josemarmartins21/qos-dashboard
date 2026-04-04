<?php

namespace App\services\questions\contracts;

use App\Models\Question;

interface QuestionServiceInterface {
    public function getAll();
    public function get(int $id): Question; 
    public function save($question = []) : array;
    public function delete(int $id): bool; 
    public function update(int $id, array $question): Question;
}