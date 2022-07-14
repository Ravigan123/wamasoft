<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Server;
use App\Models\Title;
use Illuminate\Support\Facades\DB;

class QualityController extends Controller
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
        // $dane = Quality::all();

        // $dane = DB::select('*')
        //     ->join('servers', 'servers.id', '=', 'serverTitles.server_id')
        //     ->select('id')->get();

        $dane = DB::table('servers')
            ->join('serverTitles', 'servers.id', '=', 'serverTitles.server_id')
            ->join('titles', 'titles.id', '=', 'serverTitles.title_id')
            ->join('qualities', 'qualities.serverTitle_id', '=', 'serverTitles.id')
            ->select('servers.name', 'qualities.date', 'qualities.id','qualities.serverTitle_id','titles.name_title', 'qualities.worth')
            // ->where('titles.name_title', 'statusCPU')
            // ->where('servers.name', 'server2')
            ->get();

        $query = Server::all()->groupBy('name');

        return view('index', [ 'dane' => $dane , 'query' => $query]);
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
    public function data(Request $request)
    {
        dd($_GET);

        // foreach ($request->all() as $data){
        //     Quality::insert([
        //          'item' => $data['item'],
        //          'subitem' => $data['subitem'],
        //          'subitem2' => $data['subitem2'],
        //          'unit' => $data['unit']
        //     ]);
        //   }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function show(Quality $quality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function edit(Quality $quality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quality $quality)
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
        $del = DB::table('qualities')->where('id', $id)->delete();
        // $del = DB::table('camera_server')->where('server_id', $id)->delete();
        // $del = Dane::where('server', $id)->delete(); po nazwie
        return response()->json(['status' => 'success']);
    }
}
