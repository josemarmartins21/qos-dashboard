<?php

namespace App\services\testimonys;


use App\Models\Testimony;
use App\services\clients\contracts\ClientServiceInterface;
use App\services\testimonys\contracts\TestimonyServiceInterface;

class TestimonyService implements TestimonyServiceInterface   {

    public function getAll(): array
    {
        if (count(Testimony::all()->toArray()) === 0) {
            throw new \Exception("Não há depoimentos cadastrados.");
        }
        return Testimony::all()->toArray();
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
            'client_id' => $data['client_id'] ?? null,
        ]);
            
        if (count($testimony->toArray()) === 0) {
            throw new \Exception("Erro ao criar o depoimento, tente novamente.");
        }

        return $testimony->toArray();
    }

    public function delete(int $id): bool
    {
        $testimony = Testimony::findOrFail($id);
        if (!$testimony) {
            throw new \Exception("Depoimento não encontrado.");
        }

        $deleted = $testimony->delete();
        if ($deleted === false) {
            throw new \Exception("Erro ao eliminar o depoimento, tente novamente.");
        }
        
        return $deleted;
    }

}