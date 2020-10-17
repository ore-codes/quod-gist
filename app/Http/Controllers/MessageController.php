<?php

namespace App\Http\Controllers;

use App\Actions\Message\CreateMessage;
use App\Http\Requests\NewChatMessage;
use App\Models\Message;
use App\Models\Server;
use Illuminate\Http\Request;
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
            Message::where('server_id', $server)->with(['author'])->paginate(20),
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
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
