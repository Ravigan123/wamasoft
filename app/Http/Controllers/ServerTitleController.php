<?php

namespace App\Http\Controllers;

use App\Models\ServerTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServerTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Server_Title  $server_Title
     * @return \Illuminate\Http\Response
     */
    public function show(ServerTitle $server_Title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Server_Title  $server_Title
     * @return \Illuminate\Http\Response
     */
    public function edit(ServerTitle $server_Title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Server_Title  $server_Title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServerTitle $server_Title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dane  $dane
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $del = ServerTitle::find($id);
        $del = DB::table('serverTitles')->where('id', $id)->delete();
        // $del = DB::table('camera_server')->where('server_id', $id)->delete();
        // $del = Dane::where('server', $id)->delete(); po nazwie
        return response()->json(['status' => 'success']);
    }
}
