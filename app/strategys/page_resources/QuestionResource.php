<?php

namespace App\strategys\page_resources;

use App\Models\Question;
use App\strategys\page_resources\contracts\PageResourceInterface;

class QuestionResource implements PageResourceInterface 
{
    private string $informationKey;

    public function __construct()
    {
        $this->informationKey = 'questions';
    }

    public function get()
    {
        $questions = Question::select('question', 'response')
        ->where('is_active', 1)
        ->limit(6)
        ->get();

        return $questions;
    }

    public function getInformationKey(): string
    {
        return $this->informationKey;
    }
}