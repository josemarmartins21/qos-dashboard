<?php

namespace App;

use DateTime;
use InvalidArgumentException;

trait ImageTrait
{
    private string $name;

    /**
     * Gera um nome para imagem que será salvo 
     * na BD.
     */
    public function generateName($requestImage) : void
    {

        if (! $this->validate($requestImage)) throw new InvalidArgumentException("Imagem Inválida!");
    
        $extension = $requestImage->extension();

        $this->name = md5($requestImage->getClientOriginalName() . new DateTime()->getTimestamp()) . "." . $extension;
    }

    public function getImageName(): string 
    {
        return $this->name;
    }

    /**
     * Valida se a imagem é válida.
    */
    private function validate($requestImage): bool
    {
        if (! $requestImage->isValid()) {
            return false;
        }
        return true;
    }
}
