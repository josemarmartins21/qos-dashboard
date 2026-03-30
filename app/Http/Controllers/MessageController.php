<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }
}
