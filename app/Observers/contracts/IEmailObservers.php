<?php

namespace App\Observers\contracts;

use App\Models\Message;

interface IEmailObservers 
{
    public function send(Message $message): void;
}
