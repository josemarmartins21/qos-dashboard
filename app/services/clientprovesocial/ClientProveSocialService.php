<?php

namespace App\services\clientprovesocial;
// client_prove_socials


use App\Models\ClientProveSocial;
use App\services\clientprovesocial\contracts\ClientProveSocialInterface;

class ClientProveSocialService implements ClientProveSocialInterface {

    /**
     * Lista todos clientes cadastrados.
     * @return array
     */
    public function getAll(): array
    {
        $attributes = ['logo', 'url', 'client_id', 'is_active', 'created_at',];
        $proveSocial = ClientProveSocial::select($attributes)->get()->toArray();
        return $proveSocial;
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

    public function delete(int $id): bool
    {
        $client = Client::findOrFail($id);
        return $client->delete();
    }

    public function update(int $id, $data = []): Client
    {
        $client = Client::findOrFail($id);
        $client->update($data);
        return $client;
    }
    public function get(int $id): Client
    {
        return Client::findOrFail($id);
    } */
    
}