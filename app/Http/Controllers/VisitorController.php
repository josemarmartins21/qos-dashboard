<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\services\visitors\contracts\VisitorServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class VisitorController extends Controller
{
    public function __construct(
        private VisitorServiceInterface $visitorService,
    ) {}

    public function index()
    {
        try {
            $visitors = $this->visitorService->getAll();

            return response()->json([
                'status' => true,
                'visitors' => $visitors,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(Visitor $visitor)
    {
        try {

            $visitor = $this->visitorService->get($visitor->id);

            return response()->json([
                'status' => true,
                'visitor' => $visitor,
            ]);
        } catch (Exception $e) {
            return response()->json([
                    'status' => false,
                    'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        
        try {
            $validator = $this->validate($request->all());
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'messages' => $validator->errors(),
                ], 400);
    
            }
            $visitorData = $validator->safe(['full_name','email','phone',]);
            $message = $validator->safe(['body','subject',]);
    
            $visitor = $this->visitorService->create($visitorData, $message);
    
            return response()->json([
                'status' => true,
                'visitor' => $visitor,
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Visitor $visitor)
    {
        try {
            $deleted = $this->visitorService->delete($visitor->id);

            return response()->json([
                'status' => $deleted,
                'message' => 'Visitante eliminado com sucesso.',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }   
    }

    private function validate($data = []): ValidationValidator {
        $validator = Validator::make($data, [
            'full_name' => ['bail','required','string',],
            'email' => ['bail','required','string','lowercase','unique:visitors,email','email'],
            'phone' => ['bail','required','string','max:300','starts_with:9,2','ends_with:1,2,3,4,5,6,7,8,9,0','max:13','min:9'],
            'subject' => ['bail','required','string','max:255'],
            'body' => ['bail','required','string'],
        ], [
             'full_name.required' => 'O campo :attribute é obrigatório.',
             'phone.ends_with' => 'O campo :attribute deve terminar com um número.',
             'phone.starts_with' => 'O campo :attribute deve começar com um número 9 ou 2, foi passado :input.',
             'email.unique' => 'O :attribute já está sendo utilizado!'
        ], [
            'full_name' => 'nome completo',
            'subject' => 'assunto',
            'body' => 'corpo da mensagem',
            'phone' => 'telefone',
        ]);
        return $validator;
    }
}
