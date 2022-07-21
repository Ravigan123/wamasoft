<?php

namespace Dominik\Config;

use App\Http\Controllers\Controller;
use Dominik\Config\Models\ConfigKey;
use Dominik\Config\Models\ConfigValue;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigValueController extends Controller
{
      /**
     * Display a listing of the resource.
     * 
     * @return View
     */
    public function index($id): View
    {
        // $data = DB::table('configKeys')->select('*')->get();
        // $data = ConfigKey::all();

        $data = DB::table('configValues')->select('*')
        ->where("configKeys_id", $id)->get();
        // $data = DB::table('configValues')
        //     ->join('configValues', 'configKeys.id', '=', 'configValues.configKeys_id')
        //     ->select('*')
        //     ->where('configKeys_id', $id)->get();
            // ->where('titles.name_title', 'statusCPU')
            // ->where('servers.name', 'server2')

        return view('config/details', [ 'data' => $data ]);
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
     * @param  \App\Models\ConfigValue  $configValue
     * @return \Illuminate\Http\Response
     */
    public function show(ConfigValue $configValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfigValue  $configValue
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigValue $configValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConfigValue  $configValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfigValue $configValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfigValue  $configValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfigValue $configValue)
    {
        //
    }
}
