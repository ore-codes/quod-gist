<?php


namespace App\Actions\Message;


use App\Http\Requests\NewChatMessage;
use App\Models\Message;
use App\Models\Server;
use App\Models\User;

class CreateMessage
{
    public function create(User $user, Server $server, NewChatMessage $request)
    {
        list('message' => $content) = $request->validated();

        $message = new Message(['content' => $content]);
        $message->author()->associate($user);
        $server->messages()->save($message);

        return $message;
    }
}
