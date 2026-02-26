<?php

namespace App\services\clientprovesocial;

use App\factorys\contracts\TestimonySocialProveInterface;
use App\services\clients\contracts\ClientServiceInterface;
use App\Models\ClientProveSocial;
use App\services\clientprovesocial\contracts\ClientProveSocialInterface;
use Illuminate\Support\Facades\DB;

class ClientProveSocialService implements ClientProveSocialInterface, TestimonySocialProveInterface {

    public function __construct(
        private ClientServiceInterface $clientService,
    ) {

    }
    /**
     * Lista todos clientes de renome cadastrados.
     * @return array
     */
    public function getAll(): array
    {
        $attributes = [ 
                        'clients.*', 
                        'client_prove_socials.logo as imagem',
                        'client_prove_socials.url', 
                        'client_prove_socials.is_active'
                    ];

        $proveSocial = DB::table('client_prove_socials')
                        ->join('clients', 'clients.id', '=', 'client_prove_socials.client_id')
                        ->select($attributes)
                        ->get()
                        ->toArray();

        return $proveSocial;
    }

    /**
     * Salva os dados do cliente de renome 
     * mas antes verifica se já existem 10 clientes 
     * de renome cadastrados.
     * @param array $data
     * 
     * @return array
     */
    public function save($data = []): array
    {
        if (ClientProveSocial::getLimit() > 10) {
            throw new \Exception("O número máximo de clientes de prova social excedido");
        } 

        return ClientProveSocial::create([
            'logo' => $data['logo'],
            'url' => $data['url'],
            'is_active' => $data['is_active'],
            'client_id' => $data['client_id'],
        ])->toArray();

    }
    
    /**
     * Criar um novo cliente e seu depoimento
     * caso haja menos de 11 depoimentos na base de dados.
     * @param array $data
     * 
     * @return array
     */
   /*  public function save($data = []): array
    {
        
        $client = array_slice($data, 0, 3);

        $createdClient = Client::create($client)->toArray();

        if (count($createdClient) === 0) {
            throw new \Exception("Erro ao criar cliente, tente novamente.");
        }
        
        $data['client_id'] = $createdClient['id'];

        $this->testimonyService->save($data);

        return $data;
    }

    
    public function update(int $id, $data = []): Client
    {
        $client = Client::findOrFail($id);
        $client->update($data);
        return $client;
        }
        
        */

    public function update(int $id, $data = []): array
    {
        $client = ClientProveSocial::findOrFail($id);
        $client->update($data);
        return $client->toArray();
    }
        
        
    public function get(int $id): array
    {
        $clientProveSocial = ClientProveSocial::findOrFail($id);
        $clientData = $clientProveSocial->client()->first()->toArray();
        
        return array_merge($clientProveSocial->toArray(), $clientData);   
    }
    
    /**
     * Elimia os dados de um cliente renomado
     * tanto na tabela de clientes com na
     * tabela de prova social (clientes renomados).
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id): bool
    {
        if (ClientProveSocial::count() < ClientProveSocial::getMin()) {
            throw new \Exception("O número mínimo de clientes de prova social é ".(ClientProveSocial::getMin() - 1));
        }
        
        $client = ClientProveSocial::findOrFail($id)->client()->first();
        return $client->delete();
    }
    
}