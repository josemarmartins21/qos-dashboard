<?php

namespace App\services\testimonys;

use App\factorys\ActivateDisableFatory;
use App\factorys\contracts\ActivateDisableInterface;
use App\factorys\contracts\TestimonySocialProveInterface;
use App\factorys\TestimonySocialProveFactory;
use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\Testimony;
use App\services\clients\ClientService;
use App\services\testimonys\contracts\TestimonyServiceInterface;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use Illuminate\Support\Facades\DB;
use App\services\clients\contracts\ClientServiceInterface;

class TestimonyService implements TestimonyServiceInterface, TestimonySocialProveInterface   {
    private ValidateIfCanActiveOrDisableInterface $validateAOrD;
    private ActivateDisableInterface $activateOrDisable;
    private ClientServiceInterface $clientService;

    public function __construct(
    )    
    {
        $this->clientService = new ClientService(new TestimonySocialProveFactory);
        $this->validateAOrD = ValidateIfCanActiveOrDisableFactory::create("depoimento");
        $this->activateOrDisable = ActivateDisableFatory::create("depoimento");
    }

    

    public function getAll(?string $searched = '')
    {
        $testimonies = [];

        $attributes = [
            'testimonies.id',
            'clients.company_role as cargo',
            'testimonies.testimony', 
            'testimonies.is_active',
            'clients.name as nome',
            'testimonies.created_at as data_criacao',
        ];

        if (! $searched) {
            $testimonies = DB::table('testimonies')
            ->join('clients', 'testimonies.client_id', '=', 'clients.id')
            ->select($attributes)
            ->paginate(6);

            return $testimonies;
        }

        $testimonies = DB::table('testimonies')
                ->join('clients', 'testimonies.client_id', '=', 'clients.id')
                ->select($attributes)
                ->where('clients.name', 'Like', '%' . $searched . '%')
                ->paginate(6);
    
        return $testimonies;


        
    }

    public function get(int $id): array
    {
        $testimony = DB::table('clients', 'c')
                        ->join('testimonies','c.id','=','testimonies.client_id')
                        ->select(
                            'c.name as nome',
                            'testimonies.id as id',
                            'c.id as client_id',
                            'testimonies.testimony as depoimento',
                            'c.company_role as cargo',
                            'testimonies.created_at as data_criacao',
                        )
                        ->where('testimonies.id', $id)
                        ->get();

        return $testimony->toArray();
    }

    /**
     * Cria o depoimento e válida se há menos de 11 depoimento
     * na tabel de depoimentos.
     * @param array $data
     * 
     * @return array
     */
    public function save($data = []): array
    {
        if (Testimony::getLimit() < Testimony::count()) {
            throw new \Exception("Limite de depoimentos atingido.");
        }

        $can_active = false;

        if ($data['is_active'] == true) $can_active = $this->validateAOrD->validateIfCanActive();

        $testimony = Testimony::create([
            'testimony' => $data['testimony'],
            'is_active' => $can_active,
            'client_id' => $data['client_id'],
        ])->toArray();
            
        return $testimony;
    }

    public function update(int $id, $data = []): bool
    {
        $client = [
            'name' => $data['name'],
            'company_role' => $data['company_role'],
            'client_id' => $data['client_id'],
        ];

        $this->clientService->update($client);

        $testimony = Testimony::findOrFail($id);

        return $testimony->update([
            'testimony' => $data['testimony'],
        ]);
         
    }

    public function delete(int $id): bool
    {
        if (Testimony::count()  < Testimony::getMinActive()) {
            throw new \InvalidArgumentException("Não foi possível eliminar o depoimento, pois o número mínimo de depoimentos será ultrapassado.");
        }

        $this->activateOrDisable->disable($id);
        
        $testimony = Testimony::findOrFail($id);

        $deleted = $testimony->delete();
        
        return $deleted;
    }

}