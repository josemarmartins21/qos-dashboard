<?php

namespace App\Observers;

use App\Mail\VisitorEmail;
use App\Models\Message;
use App\Models\Visitor;
use App\Observers\contracts\IEmailObservers;
use Illuminate\Support\Facades\Mail;

class VisitorObserver implements IEmailObservers
{
    /**
     * Envia email para o visitante
     * @return void
     */
    public function send(): void
    {
        $visitor = Visitor::latest()->first();
        $message = Message::latest()->first();
        
        Mail::to("qostel@email.com")->send(new VisitorEmail($visitor, $message));
    }
}
