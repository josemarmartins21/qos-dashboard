<?php

namespace App\Http\Controllers;

use App\Http\Requests\client_prove_social\ClientProveSocialRequest;
use App\Http\Requests\client_prove_social\ClientProveSocialUpdateRequest;
use App\Models\ClientProveSocial;
use App\services\clientprovesocial\contracts\ClientProveSocialInterface;
use App\services\clients\contracts\ClientServiceInterface;
use Illuminate\Http\Request;
use App\ImageTrait;

class ClientProveSocialController extends Controller
{
    use ImageTrait;

    public function __construct(
        private ClientServiceInterface $clientService,
        private ClientProveSocialInterface $clientProveSocial,
    )
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->searched) {
                $clientsProveSocials = $this->clientProveSocial->getBySearch($request->searched);
            } else {
                $clientsProveSocials = $this->clientProveSocial->getAll();
            }

            return view('prove_social.index', compact('clientsProveSocials'));

        } catch (\Throwable $e) {
            dd($e->getMessage());
            /* return view('erros.404'); */
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = $this->clientService->getAll();
        return view('prove_social.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Cria um cliente renomado e utiliza o serviço
     * de clientprovesocial passando o tipo de cliente
     *  para salvar os dados do cliente renomado.
     */
    public function store(ClientProveSocialRequest $request)
    {
        try {
            
            $request->validated();
                
            $client = $request->safe([
                'client_name',
                'user_id',
                'company_role',
            ]);
                
            $relation = $request->safe([
                'logo', 
                'is_active', 
                'url',
                'type',
            ]);

            $relation['logo'] = $this->save($request, ClientProveSocial::getPathImages());
                
            $this->clientService->save($client, $relation);
    
            return redirect()
                    ->route('client_prove_socials.index')
                    ->with('success','Cliente criado com sucesso!');

        } catch (\Throwable $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientProveSocial $clientProveSocial)
    {
        // dd($clientProveSocial->client);
        return view('prove_social.edit', compact('clientProveSocial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ClientProveSocialUpdateRequest $request, 
        ClientProveSocial $clientProveSocial,
    )
    {
        try {

            $request->validated();

            $client = $request->safe([
                'name',
                'company_role',
                'client_id',
            ]);

            $proveSocialClient = $request->safe([
                'logo', 
                'url',
            ]);

            if (array_key_exists('logo', $proveSocialClient)) {
                $proveSocialClient['logo'] = $this->save($request, ClientProveSocial::getPathImages());
            }

            $this->clientService->update($client);   

            $this->clientProveSocial->update($clientProveSocial->id, $proveSocialClient);
            
            return redirect()->route('client_prove_socials.index');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientProveSocial $clientProveSocial)
    {
        try {
            $this->clientProveSocial->delete($clientProveSocial->id);

            return redirect()->route('client_prove_socials.index');
            
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
