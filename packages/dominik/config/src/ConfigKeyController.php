<?php

namespace Dominik\Config;

use App\Http\Controllers\Controller;
use Dominik\Config\Models\ConfigKey;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use NotificationChannels\Telegram\Telegram; 

class ConfigKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $data = DB::table('configKeys')->select('*')->get();
        // $data = ConfigKey::all();

        // $data = DB::table()->select('*') ->get();

        return view('config/index', [ 'data' => $data ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function form(): View
    {
        return view('config/form');
    }

    

    public function send(Request $request) {
        $updates = new Telegram(token:"5472359963:AAHrB4WrocBGFJVyDdowvgIU8BWh1KwzbpY");
        $updates->sendMessage(['text' => $request->tresc, "chat_id" => "-787810876"]);

        return redirect('/config/form');
    }


    // public function toGoogleChat($notifiable)
    // {
    //     // echo $request->email;
    //     dd($notifiable);
    //     return GoogleChatMessage::create($notifiable);
    // }
    

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

