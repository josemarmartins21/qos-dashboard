<?php

namespace App\Http\Controllers;

use App\Models\ClientProveSocial;
use App\services\clientprovesocial\ClientProveSocialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientProveSocialController extends Controller
{
    public function __construct(
        private ClientProveSocialService $clientProveSocialService,
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        /** |image|mimes:jpeg,png,jpg,gif,svg */
        $validator = Validator::make($request->all(), [
            'name' => ['required|string|max:100'],
            'logo' => 'required|max:2048',
            'url' => 'required|url',
            'is_active' => 'required|boolean|min:0|max:1',
        ], [
            'name.required' => 'O :attribute é obrigatório',
            'logo.required' => 'O :attribute é obrigatório',
            'url.url' => 'O :attribute deve ser uma URL válida. Foi enviada :input', 
        ], [
            'name' => 'nome',
            'logo' => 'logotipo',
            'url' => 'link',
        ]);

        

        var_dump($validator->fails());
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientProveSocial $clientProveSocial)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientProveSocial $clientProveSocial)
    {
        //
    }
}
