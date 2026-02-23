<?php

namespace App\services\testimonys;


use App\Models\Testimony;
use App\services\testimonys\contracts\TestimonyServiceInterface;
use Illuminate\Support\Facades\DB;

class TestimonyService implements TestimonyServiceInterface   {

    public function getWithClient(): array
    {
        $testimonies = DB::table('testimonies')
        ->join('clients', 'testimonies.client_id', '=', 'clients.id')
        ->select('testimonies.*', 'clients.name as nome')
        ->orderByDesc('testimonies.created_at')
        ->get();
        
        return $testimonies->toArray();
    }

    public function get(int $id): array
    {
        $testimony = Testimony::findOrFail($id);
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

        $testimony = Testimony::create([
            'testimony' => $data['testimony'],
            'is_active' => $data['is_active'] ?? false,
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
        $testimony = Testimony::findOrFail($id);

        $deleted = $testimony->delete();
        
        return $deleted;
    }

}