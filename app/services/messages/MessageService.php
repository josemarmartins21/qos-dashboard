<?php


namespace App\services\messages;

use App\Models\Message;
use App\services\messages\contracts\MessageServiceInterface;

class MessageService implements MessageServiceInterface {
    public function create($message = []): Message
    {
        $messageCreated = Message::create([
            'subject' => $message['subject'],
            'body' => $message['body'],
            'visitor_id' => $message['visitor_id'],
        ]);

        return $messageCreated;
    }

    public function delete(int $id): bool
    {
        return false;
    }
}