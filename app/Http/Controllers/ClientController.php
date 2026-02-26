<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\services\clients\contracts\ClientServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

    public function __construct(
        private ClientServiceInterface $clientService,
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clients = $this->clientService->getAll();
            return response()->json([
                'status' => true,
                'data' => $clients,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
            try { 
            $validator = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:100', 'min:4'],
                    'company_role' => ['required', 'string'],
                    'user_id' => ['nullable', 'integer', 'exists:users,id', 'min:1', 'numeric'],
                    'testimony' => ['required', 'string',],
                    'type' => ['required', 'string',],
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

            $client = $request->only(['name', 'company_role', 'user_id']);
            $relation = $request->only(['testimony', 'is_active', 'type']);
            
            $client = $this->clientService->save($client, $relation);

            return response()->json([
                'status' => true,
                'data' => $client,
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        } 
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        try {
            $client = $this->clientService->get($client->id);

            return response()
                    ->json([
                        'status' => true,
                        'data' => $client->toArray(), 
                    ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:100', 'min:4'],
                'company_role' => ['required', 'string'],
                'user_id' => ['nullable', 'integer', 'exists:users,id', 'min:1', 'numeric'],
            ],  [
                'name.required' => 'O campo :attribute é obrigatório.',
                'company_role.required' => 'O campo :attribute é obrigatório.',
            ], [
                'name' => 'nome', 
                'company_role' => 'cargo/empresa',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'messages' => $validator->errors(),
                ], 400);
            }

            $client = $this->clientService->update($client->id, $validator->validated());

            return response()->json([
                'status' => true,
                'data' => $client->toArray(),
            ], 200);    
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try {
            $client = $this->clientService->delete($client->id);

            return response()->json([
                'status' => $client,
                'message' => 'Cliente deletado com sucesso.',
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
