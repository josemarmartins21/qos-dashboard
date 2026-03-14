<?php

namespace Tests\Feature;

use App\Mail\EmpresaEmail;
use App\Models\Message;
use App\Models\Visitor;
use App\Observers\EmpresaObserver;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ObserversUseMessageVisitorTest extends TestCase
{
    public function test_empresa_observer_uses_the_message_visitor(): void
    {
        Mail::fake();

        $visitor = new Visitor([
            'full_name' => 'Visitor One',
            'email' => 'visitor.one@example.com',
            'phone' => '912345678',
        ]);

        $message = new Message([
            'subject' => 'Assunto',
            'body' => 'ConteÃºdo',
        ]);

        $message->setRelation('visitor', $visitor);

        (new EmpresaObserver())->send($message);

        Mail::assertSent(EmpresaEmail::class, function (EmpresaEmail $mailable) {
            return $mailable->hasTo('visitor.one@example.com');
        });
    }
}

