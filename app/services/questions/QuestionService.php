<?php

namespace App\services\questions;

use App\Models\Question;
use App\services\questions\contracts\QuestionServiceInterface;

class QuestionService implements QuestionServiceInterface {


    public function getAll(): array {
        $questions = Question::latest()->get()->toArray();
        return $questions;
    }

    public function save($data = []): array
    {
        if ((Question::count() + 1) < Question::getLimit()) {
            return Question::create($data)->toArray();
        }
        throw new \Exception("Número máximo de perguntas atingido.");
    }

    public function update(int $id, $data = []): Question
    {
        $question = Question::findOrFail($id);
        
        $question->update($data);

        return $question;
    }
    
    public function get(int $id): Question
    {
        return Question::findOrFail($id);
    }

    public function delete(int $id): bool 
    {
        if (Question::count() < Question::getMin()) {
            throw new \Exception("Número mínimo de perguntas atingido.");
        }
        $question = Question::findOrFail($id);

        return $question->delete();
    } 
}