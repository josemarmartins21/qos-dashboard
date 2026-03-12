<?php

namespace App\Http\Controllers;

use App\factorys\contracts\TestimonySocialProveInterface;
use App\Models\Testimony;
use App\services\testimonys\contracts\TestimonyServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonyController extends Controller
{
    public function __construct(
        private TestimonyServiceInterface | TestimonySocialProveInterface $testimonyService,
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
                    'client_id' => ['required','integer', 'exists:clients,id', 'min:1', 'numeric'],
                    'testimony' => ['required', 'string',],
                    'is_active' => ['boolean', 'min:0', 'max:1',],
                ],  [
                    'testimony.required' => 'O :attribute é obrigatório.',
                ], [
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

    public function show(Testimony $testimony)
    {
        try {
            $testimony = $this->testimonyService->get($testimony->id);
            return response()->json([
                'status' => true,
                'data' => $testimony,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function update(Request $request, Testimony $testimony)
    {
        try {
            $validator = Validator::make($request->all(), [
                    'client_id' => ['required', 'integer', 'exists:clients,id', 'min:1', 'numeric'],
                    'testimony' => ['required', 'string',],
                    'is_active' => ['boolean', 'min:0', 'max:1',],
                ],  [
                    'testimony.required' => 'O :attribute é obrigatório.',
                ], [
                    'testimony' => 'depoimento',
                ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'messages' => $validator->errors(),
                ], 400);
            }  

            $updatedTestimony = $this->testimonyService->update($testimony->id, $validator->validated());

            return response()->json([
                'status' => $updatedTestimony,
                'message' => 'depoimento atualizado com sucesso!',
            ], 200);

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
