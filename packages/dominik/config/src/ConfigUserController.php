<?php

namespace Dominik\Config;

use App\Http\Controllers\Controller;
use Dominik\Config\Models\ConfigUser;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use NotificationChannels\Telegram\Telegram; 

class ConfigUserController extends Controller
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
        $status=ConfigUser::where('user',$request->user)->first();

        if(!isset($status->user))
        {
            $user = new ConfigUser();
            $user->user = $request->user;
            $user->token = $request->token;
            $user->save();
        }
        else
            return response([ 'Status' => 'Error', 'Message' => 'Uzytkownik o podanej nazwie juz istnieje']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConfigUser  $configUser
     * @return \Illuminate\Http\Response
     */
    public function show(ConfigUser $configUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfigUser  $configUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigUser $configUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConfigUser  $configUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfigUser $configUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfigUser  $configUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfigUser $configUser)
    {
        //
    }
}
