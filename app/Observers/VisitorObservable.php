<?php

namespace App\Observers;

use App\Models\Message;
use App\Observers\contracts\IEmailObservers;
use App\Observers\contracts\IVisitorObservable;

class VisitorObservable implements IVisitorObservable
{
    private $observers = [];

    /**
     * Percorre a lista de observers adicionados
     * e os observers reagem a alteraÃ§Ã£o na tabela de
     * mensagem.
     */
    public function notify(Message $message): void
    {
        foreach ($this->observers as $observer) {
            $observer->send($message);
        }
    }

    /**
     * Adiciona novos observers.
     */
    public function addObservers(IEmailObservers $observer): void
    {
        $this->observers[] = $observer;
    }
}

