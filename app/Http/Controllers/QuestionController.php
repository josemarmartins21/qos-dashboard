<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\services\questions\contracts\QuestionServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class QuestionController extends Controller
{
    public function __construct(
        private QuestionServiceInterface $questionService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       try {

        $questions = $this->questionService->getAll();
         
         return response()->json([
            'status' => true,
            'data' => $questions
         ]);
       } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage() 
            ], 500);
       }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validator = $this->validate($request->all());
    
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }
    
            $question = $this->questionService->save($validator->safe()->all());

            return response()->json([
                'status' => true,
                'data' => $question,
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        try {

            $question = $this->questionService->get($question->id);

            return response()->json([
                'status' => true,
                'data' => $question
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        try {

            $validator = $this->validate($request->all());
    
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 400);
            }
    
            $questionData =$this->questionService->update($question->id, $validator->validated())->toArray();

            return response()->json([
                'status' => true,
                'message' => $questionData,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 404);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        try {

            $this->questionService->delete($question->id);

            return response()->json([
                'status' => true,
                'message' => 'Pergunta deletada com sucesso.'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 404);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    private function validate($data = []): ValidationValidator {

        $validator = Validator::make($data, [
            'question' => ['bail','required','string','max:300'],
            'response' => ['bail','required','string','max:300'],
            'is_active' => ['bail','required','boolean','min:0','max:1'],
        ], [
             'question.required' => 'A pergunta é obrigatória.',
             'response.required' => 'A resposta é obrigatória.',
        ] , [
            'question' => 'pergunta',
            'response' => 'resposta',
            'is_active' => 'activo',
        ]);
        
        return $validator;
    }
}
