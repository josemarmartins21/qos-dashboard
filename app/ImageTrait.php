<?php

namespace App;

use DateTime;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

trait ImageTrait
{
    public function save(
        Request $request, 
        string $path, 
    ) : string
    {
        if (!($request->file('logo')->isValid() AND $request->hasFile('logo'))) {
            throw new \Exception("Fotografia Inválida!");    
        }

        $imageRequest = $request->file('logo');

        $extension = $imageRequest->extension();

        $imageNewName = md5($imageRequest->getClientOriginalName() . new DateTime()->getTimestamp()) . "." . $extension;

        $imageRequest->move(public_path($path), $imageNewName);

        return $imageNewName;
    }
}
