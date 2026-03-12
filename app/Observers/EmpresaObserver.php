<?php

namespace App\Observers;

use App\Mail\EmpresaEmail;
use App\Models\Message;
use App\Models\Visitor;
use App\Observers\contracts\IEmailObservers;
use Illuminate\Support\Facades\Mail;

class EmpresaObserver implements IEmailObservers
{
    /** Envia
     * @return void
     */
    public function send(): void
    {
        $visitor = Visitor::latest()->first();
        $message = Message::latest()->first();


        Mail::to("kiene@gmail.pt")->send(new EmpresaEmail($visitor, $message));
    }
}
