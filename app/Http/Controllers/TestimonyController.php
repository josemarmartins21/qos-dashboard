<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use App\services\testimonys\contracts\TestimonyServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonyController extends Controller
{
    public function __construct(
        private TestimonyServiceInterface $testimonyService,
    )
    {
        
    }

    public function index()
    {
        try {
            $testimonies = $this->testimonyService->getAll();
            return response()->json([
                'status' => true,
                'data' => $testimonies,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:100', 'min:4'],
                    'company_role' => ['required', 'string'],
                    'user_id' => ['nullable', 'integer',/*  'exists:users,id',  */'min:1', 'numeric'],
                    'testimony' => ['required', 'string',],
                    'is_active' => ['boolean', 'min:0', 'max:1',],
                ],  [
                    'name.required' => 'O campo :attribute é obrigatório.',
                    'company_role.required' => 'O campo :attribute é obrigatório.',
                    'testimony.required' => 'O :attribute é obrigatório.',
                ], [
                    'name' => 'nome', 
                    'company_role' => 'cargo/empresa',
                    'testimony' => 'depoimento',
                ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'messages' => $validator->errors(),
                ], 400);
            }  

            $testimony = $this->testimonyService->save($validator->validated());

            return response()->json([
                'status' => true,
                'data' => $testimony,
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
        
    }

    public function destroy(Testimony $testimony)
    {
        try {
            $deleted = $this->testimonyService->delete($testimony->id);
            return response()
                    ->json([
                        'status' => $deleted,
                        'message' => 'depoimento eliminado com sucesso!',
                    ]);
        } catch (Exception $e) {
            return response()
                    ->json([
                        'status' => false,
                        'message' => $e->getMessage()
                    ]);
        }
    }
}
