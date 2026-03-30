<?php

namespace App\services\visitors;

use App\Models\Visitor;
use App\services\messages\contracts\MessageServiceInterface;
use App\services\visitors\contracts\VisitorServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class VisitorService implements VisitorServiceInterface {
    public function __construct(
        private MessageServiceInterface $messageService,
    ){}
    /**
     * Retorna todos os visitantes com suas mensagens.
     * @return Collection
     */
    public function getAll(): LengthAwarePaginator 
    {
        $visitors = DB::table('visitors')->join(
            'messages', 
            'messages.visitor_id', '=', 'visitors.id'
        )->select(
                'messages.id as message_id', 
                'visitors.full_name as nome',
                'visitors.phone as tel',
                'visitors.email',
        )->orderByDesc('messages.created_at')->paginate(5);

        return $visitors;
    }

    /**
     * Cria um novo ou actualiza o registro
     * de um visitante caso seu email
     * já esteja resgistado.
     * @param array $visitor
     * @param array $message
     *     
     * @return Collection
     */
    public function create($visitor = [], $message = [])
    {
        $visitorCreated = Visitor::updateOrCreate(
            [
                'phone' => $visitor['phone'],
            ], [
                    'email' => $visitor['email'],
                    'full_name' => $visitor['full_name'],
        ]);

        $message['visitor_id'] = $visitorCreated->id;
        
        $this->messageService->create($message);

        return Visitor::with('messages')->find($visitorCreated->id);
    }

    public function delete(int $id): bool {
        $visitor = Visitor::findOrFail($id);
        return $visitor->delete();
    }

    public function get(int $id)
    {
        return Visitor::with('messages')->find($id);
    }
}