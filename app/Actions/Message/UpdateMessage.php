<?php


namespace App\Actions\Message;

use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;

class UpdateMessage
{
    public function update(Message $message, UpdateMessageRequest $request)
    {
        list('message' => $newMessage) = $request->validated();

        $message->update([
            'content' => $newMessage,
        ]);

        return $message;
    }
}
