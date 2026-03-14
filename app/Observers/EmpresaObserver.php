<?php

namespace App\Observers;

use App\Mail\EmpresaEmail;
use App\Models\Message;
use App\Observers\contracts\IEmailObservers;
use Illuminate\Support\Facades\Mail;

class EmpresaObserver implements IEmailObservers
{
    /** Envia
     * @return void
     */
    public function send(Message $message): void
    {
        $message->loadMissing('visitor');
        $visitor = $message->visitor;

        if (!$visitor) {
            return;
        }

        Mail::to($visitor->email)->send(new EmpresaEmail($visitor, $message));

    }
}
