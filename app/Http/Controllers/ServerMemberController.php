<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ServerMemberController extends Controller
{
    /**
     * Show form to join server
     *
     * @param int $id
     * @return Response
     */
    public function join(int $id)
    {
        $server = Server::findOrFail($id);
        return $server->members->contains(Auth::user())
            ? redirect(route('servers.show', ['server' => $id]))
            : view('server_members.join')->with('server', $server);
    }

    /**
     * Add member to server
     *
     * @param int $id
     * @return Response
     */
    public function add(int $id)
    {
        Server::findOrFail($id)->members()->attach(Auth::id());
        return redirect(route('servers.show', ['server' => $id]));
    }

    /**
     * Remove member from server
     *
     * @param int $serverId
     * @param int $memberId
     * @return JsonResponse
     */
    public function remove(int $serverId, ?int $memberId = null) {
        Server::findOrFail($serverId)->members()->detach($memberId ?? Auth::id());
        return response()->json('', 204);
    }
}
