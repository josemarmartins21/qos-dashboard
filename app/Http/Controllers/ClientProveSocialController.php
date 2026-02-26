<?php

namespace App\Http\Controllers;

use App\Models\ClientProveSocial;
use App\services\clientprovesocial\contracts\ClientProveSocialInterface;
use App\services\clients\contracts\ClientServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientProveSocialController extends Controller
{
    public function __construct(
        private ClientServiceInterface $clientService,
        private ClientProveSocialInterface $clientProveSocial,
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $clientsProveSocial = $this->clientProveSocial->getAll();
            return response()->json([
                'status' => true,
                'data' => $clientsProveSocial,
            ]);

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
           
            $validator = $this->validateCreate($request->all());

            if ($validator->fails()) {
                return response()->json(['status' => false, $validator->errors()], 400);
            }

            $client = $request->only(['name', 'user_id']);

            $relation = $request->only([
                'logo', 
                'is_active', 
                'type', 
                'url'
            ]);
                
            $result = $this->clientService->save($client, $relation);
    

            return response()->json([
                'status' => true,
                'data' => $result,
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
    public function show(ClientProveSocial $clientProveSocial)
    {
        $clientProveSocial = $this->clientProveSocial->get($clientProveSocial->id);
        return response()->json([
            'status' => true,
            'data' => $clientProveSocial,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientProveSocial $clientProveSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientProveSocial $clientProveSocial)
    {
        try {

            $validator = $this->validateUpdate($request->all());

            if ($validator->fails()) {
                return response()->json(['status' => false, $validator->errors()], 400);
            }

            $client = $request->only([
                'name',
                'user_id',
                'client_id',
            ]);

            $proveSocialClient = $request->only([
                'logo', 
                'url'
            ]);

            $client = $this->clientService->update($client['client_id'], $client);   

            $result = $this->clientProveSocial->update($clientProveSocial->id, $proveSocialClient);

            return response()->json([
                'status' => true,
                'data' => array_merge($client->toArray(), $result),
            ]);
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
    public function destroy(ClientProveSocial $clientProveSocial)
    {
        try {
            $this->clientProveSocial->delete($clientProveSocial->id);
            return response()->json([
                'status' => true,
                'message' => 'Cliente de prova social removido com sucesso',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Valida os dados de entrada para criação ou atualização de um cliente renomado.
     * @param array $data
     * 
     * @return [type]
     */
    private function validateUpdate($data = [])
    {
        $validator = Validator::make($data, [
                'logo' => ['bail','required','max:2048'],
                'url' => ['bail','required' ,'url','unique:client_prove_socials,url',/* 'exists:client_prove_socials,url' */],
                "name" => ['bail','required', 'string', 'max:100', 'min:4'],
                'client_id' => ['bail','required','min:1','numeric']

            ], [
                'logo.required' => 'O :attribute é obrigatório',
                'url.url' => 'O :attribute deve ser uma URL válida. Foi enviada :input',  
                'url.unique' => 'O :attribute :input já está registada',
            ], [
                'logo' => 'logotipo',
                'url' => 'link',
            ]);

        return $validator;
    }

    private function validateCreate($data = []) {
         /** |image|mimes:jpeg,png,jpg,gif,svg */
        $validator = Validator::make($data, [
                'name' => ['bail','required', 'string', 'max:100', 'min:4'],
                'logo' => ['bail','required','max:2048'],
                'url' => ['bail','required' ,'url',/* 'exists:client_prove_socials,url' */],
                'is_active' => ['bail','required','boolean','min:0','max:1'],
                'user_id' => ['bail','nullable'],
                'type' => ['bail','required'],
            ], [
                'name.required' => 'O :attribute é obrigatório',
                'logo.required' => 'O :attribute é obrigatório',
                'url.url' => 'O :attribute deve ser uma URL válida. Foi enviada :input', 
                'url.exists' => 'A url :input ja esta registada',   
            ], [
                'name' => 'nome',
                'logo' => 'logotipo',
                'url' => 'link',
            ]);

            return $validator;
    }
}
