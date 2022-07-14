<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        // $dane = server::paginate(2);
        // $dane = DB::table('servers')
        //     ->join('servers', 'servers.id', '=', 'server_camera.server_id')
        //     ->select('servers.data', 'servers.name',);
        // $query = Dane::select(DB::raw('MAX(id) as max_id'))->groupBy('server')->get();
        // $dane = Dane::select('*')->whereIn('id', $query)->get(); // te 2 wyswietlenie ostatnich rekodrów po zgrupowaniu
        // return view('index', [ 'dane' => $dane]);
        // $dane1 = server::where('name', 'server2')->get();
        // $dane = server::select('*')->orderBy('name', 'asc')->get();
        $dane = Server::all();

        return view('index', [ 'dane' => $dane ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $server)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        //
    }
}
