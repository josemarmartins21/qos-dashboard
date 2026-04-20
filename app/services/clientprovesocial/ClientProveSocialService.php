<?php

namespace App\services\clientprovesocial;

use App\factorys\ActivateDisableFatory;
use App\factorys\contracts\ActivateDisableInterface;
use App\factorys\contracts\TestimonySocialProveInterface;
use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\ClientProveSocial;
use App\services\clientprovesocial\contracts\ClientProveSocialInterface;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use Illuminate\Support\Facades\DB;

class ClientProveSocialService implements ClientProveSocialInterface, TestimonySocialProveInterface {
    private ValidateIfCanActiveOrDisableInterface $validateAOrD;
    private ActivateDisableInterface $activateOrDisable;

    public function __construct()
    {
        $this->validateAOrD = ValidateIfCanActiveOrDisableFactory::create("prova social");
        $this->activateOrDisable = ActivateDisableFatory::create("prova social");
    }
    /**
     * Lista todos clientes de renome cadastrados.
     * @return array
     */
    public function getAll(?string $search = '')
    {
        $attributes = [ 
            'clients.*', 
            'client_prove_socials.logo as imagem',
            'client_prove_socials.url', 
            'client_prove_socials.is_active',
            'client_prove_socials.id as prove_social_id',
        ];

        $proveSocial = [];

        if (! $search) {
            $proveSocial = DB::table('client_prove_socials')
            ->join('clients', 'clients.id', '=', 'client_prove_socials.client_id')
            ->select($attributes)
            ->paginate(6);
            
            return  $proveSocial;           
        }             

        $proveSocial = DB::table('client_prove_socials')
        ->join('clients', 'clients.id', '=', 'client_prove_socials.client_id')
        ->select($attributes)
        ->where('clients.company_role', 'Like', '%'. $search . '%')
        ->paginate(6);

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
        if ($data['is_active'] == false) $can_active = $this->validateAOrD->validateIfCanDisable();
        

        return ClientProveSocial::create([
            'logo' => $data['image'],
            'url' => $data['url'],
            'is_active' => $can_active,
            'client_id' => $data['client_id'],
        ])->toArray();

    }
    


    public function update(int $id, $data = []): array
    {
    
        $client = ClientProveSocial::findOrFail($id);

        $urlExisits = ClientProveSocial::where('url', $data['url'])->where('id', '!=', $id)->exists();

        if ($urlExisits) {
            throw new \InvalidArgumentException("O URL informado já está em uso por outro cliente de prova social.");
        }

        $client->update([
            'logo' => $data['image'] ?? $client->logo,
            'url' => $data['url'],
        ]);
        
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
        if (ClientProveSocial::count() < ClientProveSocial::getMinActive()) {
            throw new \InvalidArgumentException("O número mínimo de clientes de prova social é ". (ClientProveSocial::getMinActive() - 1));
        }

        $this->activateOrDisable->disable($id);
        
        $clientRenomado = ClientProveSocial::findOrFail($id);


        return $clientRenomado->delete();
    } 
}