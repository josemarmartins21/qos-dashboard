<?php

namespace App\services\clients;

use App\Models\Client;
use App\services\clients\contracts\ClientServiceInterface;
use App\services\testimonys\contracts\TestimonyServiceInterface;

class ClientService implements ClientServiceInterface {

    public function __construct(
        private TestimonyServiceInterface $testimonyService,
    )
    {
        
    }
    /**
     * Lista todos clientes cadastrados.
     * @return array
     */
    public function getAll(): array
    {
        $clients = Client::paginate(5)->toArray();
        if (count($clients) === 0) throw new \Exception("Não há clientes cadastrados.");
        
        return $clients;
    }
    
    /**
     * Criar um novo cliente e seu depoimento
     * caso haja menos de 11 depoimentos na base de dados.
     * @param array $data
     * 
     * @return array
     */
    public function save($data = []): array
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

    public function get(int $id): Client
    {
        return Client::findOrFail($id);
    }
}