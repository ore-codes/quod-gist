<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('servers.index')->with('servers', Server::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $server = Server::findOrFail($id);

        return $server->members->contains(Auth::user())
            ? view('servers.show')->with('server', $server)
            : redirect()->route('server_members.join', ['id' => $id]);
    }
}
