<?php

namespace App\Observers\contracts;

use App\Models\Message;
use App\Observers\contracts\IEmailObservers;


interface IVisitorObservable 
{
    public function addObservers(IEmailObservers $observer): void;
    public function notify(Message $message): void;
}
