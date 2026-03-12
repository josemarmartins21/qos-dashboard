<?php

namespace App\Observers;

use App\Models\Message;
use App\Observers\contracts\IEmailObservers;
use App\Observers\contracts\IVisitorObservable;

class VisitorObservable implements IVisitorObservable
{
    private $observers = [];
    private int $numMessages;

    public function __construct()
    {
        $this->numMessages = Message::count();
    }

    /**
     * Percorre a lista de observers adicionados
     * e os observers reagem a alteração na tabela de
     * mensagem.
     * @return [type]
     */
    public function update(): void
    {
        foreach ($this->observers as $observer) {
            $observer->send();
        }

    }

    /**
     * Seta a nova qtd de mensagens na 
     * tabela de mensagens e verifica se a quantidade 
     * de menssagem é maior do que a inicial
     * e depois caso for chama os observers para poderem
     * darem o tratamento a mensagem enviada pelo visitante.
     * @param int $newNumMessage.
     * 
     * @return void
     */
    public function setNumMessages(int $newNumMessage): void
    {
        if ($this->numMessages < $newNumMessage) {
            $this->update();
        }
    }

    /**
     * Adiciona novos observers.
     * @param IEmailObservers $observer
     * 
     * @return void
     */
    public function addObservers(IEmailObservers $observer): void
    {
        $this->observers[] = $observer;
    }
}
