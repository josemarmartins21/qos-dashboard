<?php

namespace App\services\clientprovesocial;

use App\factorys\contracts\TestimonySocialProveInterface;
use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\ClientProveSocial;
use App\services\clientprovesocial\contracts\ClientProveSocialInterface;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use Illuminate\Support\Facades\DB;

class ClientProveSocialService implements ClientProveSocialInterface, TestimonySocialProveInterface {
    private ValidateIfCanActiveOrDisableInterface $validateAOrD;

    public function __construct()
    {
        $this->validateAOrD = ValidateIfCanActiveOrDisableFactory::create("prova social");
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

        $can_active = false;

        if ($data['is_active'] == true) $can_active = $this->validateAOrD->validateIfCanActive();
        
        return ClientProveSocial::create([
            'logo' => $data['logo'],
            'url' => $data['url'],
            'is_active' => $can_active,
            'client_id' => $data['client_id'],
        ])->toArray();

    }
    


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
     * tanto na tabela de clientes como na
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