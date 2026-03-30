<?php

namespace App\services\testimonys;

use App\factorys\contracts\TestimonySocialProveInterface;
use App\factorys\ValidateIfCanActiveOrDisableFactory;
use App\Models\Testimony;
use App\services\testimonys\contracts\TestimonyServiceInterface;
use App\services\validators\contracts\ValidateIfCanActiveOrDisableInterface;
use Illuminate\Support\Facades\DB;

class TestimonyService implements TestimonyServiceInterface, TestimonySocialProveInterface   {
    private ValidateIfCanActiveOrDisableInterface $validateAOrD;
    
    public function __construct()
    {
        $this->validateAOrD = ValidateIfCanActiveOrDisableFactory::create("depoimento");
    }

    public function getAll(): array
    {
        $testimonies = DB::table('testimonies')
        ->join('clients', 'testimonies.client_id', '=', 'clients.id')
        ->select(
                'testimonies.id',
                'clients.company_role as cargo',
                'testimonies.testimony', 
                'testimonies.is_active',
                'clients.name as nome',
                'testimonies.created_at as data_criacao',
            )
        ->get();
        
        return $testimonies->toArray();
    }

    public function getBySearch(string $searched): array
    {
        $attributes = [
            'testimonies.id',
            'clients.company_role as cargo',
            'testimonies.testimony', 
            'testimonies.is_active',
            'clients.name as nome',
            'testimonies.created_at as data_criacao',
        ];

        $testimonies = DB::table('testimonies')
                    ->join('clients', 'testimonies.client_id', '=', 'clients.id')
                    ->select($attributes)
                    ->where('clients.name', 'Like', '%' . $searched . '%')
                    ->get();
        
        return $testimonies->toArray();
    }

    public function get(int $id): array
    {
        $testimony = DB::table('clients', 'c')
                        ->join('testimonies','c.id','=','testimonies.client_id')
                        ->select(
                            'c.name as nome',
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
        $testimony = Testimony::findOrFail($id);

        return $testimony->update($data);
         
    }

    public function delete(int $id): bool
    {
        if (Testimony::count()  < Testimony::getMinActive()) {
            throw new \Exception("Não foi possível eliminar o depoimento, pois o número mínimo de depoimentos será ultrapassado.");
        }

        $testimony = Testimony::findOrFail($id);

        $deleted = $testimony->delete();
        
        return $deleted;
    }

}