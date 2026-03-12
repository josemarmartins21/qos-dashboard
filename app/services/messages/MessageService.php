<?php


namespace App\services\messages;

use App\Models\Message;
use App\Observers\contracts\IVisitorObservable;
use App\Observers\EmpresaObserver;
use App\Observers\VisitorObserver;
use App\services\messages\contracts\MessageServiceInterface;

class MessageService implements MessageServiceInterface {
    public function __construct(
        private IVisitorObservable $observableVisitor, 
    )
    {}
    
    public function create($message = []): Message
    {
        $messageCreated = Message::create([
            'subject' => $message['subject'],
            'body' => $message['body'],
            'visitor_id' => $message['visitor_id'],
        ]);

        // Registro dos observers.
        $this->observableVisitor->addObservers(new EmpresaObserver);
        $this->observableVisitor->addObservers(new VisitorObserver);

        // Atualização do número de mensagens e 
        // envio de email para empresa e o visitante.
        $this->observableVisitor->setNumMessages(Message::count());

        return $messageCreated;
    }

    public function delete(int $id): bool
    {
        return false;
    }
}