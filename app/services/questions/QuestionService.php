<?php

namespace App\services\questions;

use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\Question;
use App\services\questions\contracts\QuestionServiceInterface;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;

class QuestionService implements QuestionServiceInterface {
    private ValidateIfCanActiveOrDisableInterface $validateAOrD;
    
    public function __construct()
    {
        $this->validateAOrD = ValidateIfCanActiveOrDisableFactory::create("faq");
    }

    public function getAll() {
        $questions = Question::latest()->paginate(6);
        return $questions;  
    }

    public function save($data = []): array
    {
        
        if (! ((Question::count() + 1) < Question::getLimit()))
            throw new \Exception("Número máximo de perguntas atingido.");

            $can_active = false;

            if ($data['is_active'] == true) $can_active = $this->validateAOrD->validateIfCanActive();
            
            $data['is_active'] = $can_active;

            return Question::create($data)->toArray();
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