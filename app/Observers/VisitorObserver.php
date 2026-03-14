<?php

namespace App\Observers;

use App\Mail\VisitorEmail;
use App\Models\Message;
use App\Observers\contracts\IEmailObservers;
use Illuminate\Support\Facades\Mail;

class VisitorObserver implements IEmailObservers
{
    /**
     * Envia email para o visitante
     * @return void
     */
    public function send(Message $message): void
    {
        $message->loadMissing('visitor');
        $visitor = $message->visitor;

        if (!$visitor) {
            return;
        }

        Mail::to("qostel@email.com")->send(new VisitorEmail($visitor, $message));
    }
}
