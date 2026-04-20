<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Subject;

class MessageController extends Controller
{
    public function show(Message $message)
    {
       // dd($message->subject);
       $this->markAsRead($message);
       
        return view('messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back();
    }

    private function markAsRead(Message $message): void
    {
        if ($message->read !== true) {
            $message->update([
                'read' => true
            ]);
        }


    }
}
