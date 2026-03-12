<?php

namespace App\Observers\contracts;
use App\Observers\contracts\IEmailObservers;


interface IVisitorObservable 
{
    public function addObservers(IEmailObservers $observer): void;
    public function setNumMessages(int $newNumMessage): void;
    public function update(): void;
}