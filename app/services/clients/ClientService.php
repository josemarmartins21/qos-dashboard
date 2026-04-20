<?php

namespace App\services\clients;

use App\factorys\TestimonySocialProveFactory;
use App\Models\Client;
use App\services\clients\contracts\ClientServiceInterface;
use Illuminate\Support\Facades\Auth;

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
        $clients = Client::select('id', 'name')
        ->orderBy('name')
        ->get();
                    
        return $clients->toArray();
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

            $createdClient = Client::updateOrCreate([
                'name' => $client['name'],
            ], [
                'company_role' => $client['company_role'],
                'user_id' => Auth::user()->id,
            ])->toArray();

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

    public function update($data = []): Client
    {
        $client = Client::findOrFail($data['client_id']);

        $client->update([
            'name' => $data['name'],
            'company_role' => $data['company_role'],
        ]);

        return $client;
    }

    public function get(int $id): Client
    {
        return Client::findOrFail($id);
    }
    
}