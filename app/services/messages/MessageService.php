<?php

namespace App\services\messages;

use App\Models\Message;
use App\Observers\contracts\IVisitorObservable;
use App\services\messages\contracts\MessageServiceInterface;

class MessageService implements MessageServiceInterface
{
    public function __construct(
        private IVisitorObservable $observableVisitor,
    ) {}

    public function create($message = []): Message
    {
        //dd($message);
        $messageCreated = Message::create([
            'body' => $message['body'],
            'subject_id' => $message['subject_id'],
            'visitor_id' => $message['visitor_id'],
        ]);

        /* $this->observableVisitor->addObservers(new EmpresaObserver);
        $this->observableVisitor->addObservers(new VisitorObserver);

        $this->observableVisitor->notify($messageCreated->load('visitor')); */

        return $messageCreated;
    }

    public function delete(int $id): bool
    {
        return false;
    }
}

