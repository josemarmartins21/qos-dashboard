<?php

namespace App\services\questions;

use App\factorys\ActivateDisableFatory;
use App\factorys\contracts\ActivateDisableInterface;
use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\Question;
use App\services\questions\contracts\QuestionServiceInterface;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use Illuminate\Support\Facades\Auth;

class QuestionService implements QuestionServiceInterface {
    private ValidateIfCanActiveOrDisableInterface $validateAOrD;
    private ActivateDisableInterface $activateOrDisable;
    
    public function __construct()
    {
        $this->validateAOrD = ValidateIfCanActiveOrDisableFactory::create("faq");
        $this->activateOrDisable = ActivateDisableFatory::create("pergunta frequente");
    }

    public function getAll() {
        $questions = Question::latest()->paginate(6);
        return $questions;  
    }

    public function save($data = []): array
    {
        
        if (! ((Question::count() + 1) < Question::getLimit()))
            throw new \InvalidArgumentException("Número máximo de perguntas atingido.");

            $can_active = false;

            if ($data['is_active'] == true) $can_active = $this->validateAOrD->validateIfCanActive();
            
            $data['is_active'] = $can_active;

            return Question::create([
                'question' => $data['question'],
                'response' => $data['response'],
                'is_active' => $data['is_active'],
                'user_id' => Auth::user()->id,
            ])->toArray();
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
        if (Question::count() < Question::getMinActive()) {
            throw new \InvalidArgumentException("Número mínimo de perguntas atingido.");
        }

        $this->activateOrDisable->disable($id);

        $question = Question::findOrFail($id);

        return $question->delete();
    } 
}