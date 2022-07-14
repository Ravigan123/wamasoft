<?php

namespace Dominik\Config;

use App\Http\Controllers\Controller;
use Dominik\Config\Models\ConfigKey;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ConfigKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        // $data = DB::table('configKeys')->select('*')->get();
        // $data = ConfigKey::all();

        $data = DB::table('configKeys')
            ->join('configValues', 'configKeys.id', '=', 'configValues.configKeys_id')
            ->select('configKeys.key_name', 'configValues.value_name', 'configValues.value_worth', 'configValues.type')
            // ->where('titles.name_title', 'statusCPU')
            // ->where('servers.name', 'server2')
            ->get();

        return view('config', [ 'data' => $data ]);
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
     * @param  \App\Models\ConfigKey  $configKey
     * @return \Illuminate\Http\Response
     */
    public function show(ConfigKey $configKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfigKey  $configKey
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigKey $configKey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConfigKey  $configKey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfigKey $configKey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfigKey  $configKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfigKey $configKey)
    {
        //
    }
}

