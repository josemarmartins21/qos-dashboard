<?php

namespace App\Http\Controllers;

use App\Http\Requests\questions\QuestionRequest;
use App\Http\Requests\questions\QuestionUpdateResquest;
use App\Models\Question;
use App\services\questions\contracts\QuestionServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        
        return view('FAQ.index', compact('questions'));
        
       } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
       }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FAQ.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        try {
            $validated = $request->validated();
    
            $this->questionService->save($validated);

            return redirect()->route('questions.index');
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
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
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return view('FAQ.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionUpdateResquest $request, Question $question)
    {
        try {
            $validated = $request->validated();
    
            $this->questionService->update($question->id, $validated)->toArray();

            return redirect()->route('questions.index');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        try {

            $this->questionService->delete($question->id);

            return redirect()->route('questions.index');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
