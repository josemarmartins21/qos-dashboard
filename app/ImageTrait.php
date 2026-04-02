<?php

namespace App;

use DateTime;
use Illuminate\Http\Request;


trait ImageTrait
{
    public function save(
        Request $request, 
        string $path, 
    ) : string
    {
        if (!($request->file('image')->isValid() AND $request->hasFile('image'))) {
            throw new \Exception("Fotografia Inválida!");    
        }

        $imageRequest = $request->file('image');

        $extension = $imageRequest->extension();

        $imageNewName = md5($imageRequest->getClientOriginalName() . new DateTime()->getTimestamp()) . "." . $extension;

        $imageRequest->move(public_path($path), $imageNewName);

        return $imageNewName;
    }
}
