<?php

namespace App\services\clients;

use App\factorys\TestimonySocialProveFactory;
use App\Models\Client;
use App\services\clients\contracts\ClientServiceInterface;

class ClientService implements ClientServiceInterface {

    public function __construct(
        private TestimonySocialProveFactory $testimonySocialFactory,
    )
    {
        $this->testimonySocialFactory = new TestimonySocialProveFactory;
    }
    /**
     * Lista todos clientes cadastrados.
     * @return array
     */
    public function getAll(): array
    {
        $clients = Client::paginate(5)->toArray();
        return $clients;
    }
    
    /**
     * Criar um novo cliente e seu depoimento
     * caso haja menos de 11 depoimentos na base de dados.
     * @param array $data
     * 
     * @return array
     */
    public function save($client = [], $relation = []): array | string
    {
        try {

            $createdClient = Client::create($client)->toArray();
    
            $relation['client_id'] = $createdClient['id'];
    
            $service = $this->testimonySocialFactory->create($relation["type"]);
    
            $relationCreated = $service->save($relation);
            
            return array_merge($createdClient, $relationCreated);
    
        } catch (\UnhandledMatchError $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(int $id): bool
    {
        $client = Client::findOrFail($id);
        return $client->delete();
    }

    public function update(int $id, $data = []): Client
    {
        $client = Client::findOrFail($id);

        unset($data['client_id']);

        $client->update($data);

        return $client;
    }
    public function get(int $id): Client
    {
        return Client::findOrFail($id);
    }
    
}