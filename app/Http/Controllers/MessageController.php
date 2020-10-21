<?php

namespace App\Http\Controllers;

use App\Actions\Message\CreateMessage;
use App\Actions\Message\UpdateMessage;
use App\Http\Requests\NewChatMessage;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use App\Models\Server;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $server
     * @return Response
     */
    public function index(int $server)
    {
        return response()->json(
            Message::where('server_id', $server)
                ->with(['author'])
                ->latest()
                ->paginate(10),
            200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param int $server
     * @param NewChatMessage $request
     * @param CreateMessage $creator
     * @return void
     */
    public function store(int $server, NewChatMessage $request, CreateMessage $creator)
    {
        $message = $creator->create(Auth::user(), Server::findOrFail($server), $request);

        return response()->json(['message' => $message], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMessageRequest $request
     * @param int $id
     * @param UpdateMessage $editor
     * @return void
     */
    public function update(UpdateMessageRequest $request, int $id, UpdateMessage $editor)
    {
        $message = $editor->update(Message::findOrFail($id), $request);

        return response()->json(['message' => $message], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        if ($message->author_id === Auth::id()) {
            $message->delete();
            return response()->json('', 204);
        } else {
            return response()->json('Unauthorized'.$message->id.':'.Auth::id(), 403);
        }
    }
}
