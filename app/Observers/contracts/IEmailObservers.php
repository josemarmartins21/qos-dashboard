<?php

namespace App\Observers\contracts;


interface IEmailObservers 
{
    public function send(): void;
}