<?php

namespace Dominik\Config;

use App\Http\Controllers\Controller;
use Dominik\Config\Models\ConfigMessage;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use NotificationChannels\Telegram\Telegram; 
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Dominik\Config\ConfigUser;

class ConfigMessageController extends Controller
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
        
    }

    public function send(string $token, string $tresc, string $receiver)
    {
        $return = 1;
        try 
        {
            $updates = new Telegram(token:$token);
            $updates->sendMessage(['text' => $tresc, "chat_id" => $receiver]);
            
        } catch (\Throwable $th) 
        {
            $return = 0;
        }
        return $return;
    }


    public function message(Request $request) {

        // $data = json_decode($request->data, true);
        $sender = DB::table('config_users')->select('*')
        ->where("user", $request->sender)->get();
        if($sender->count() != 0)
        {
            $user = $sender[0]->user;
            $token = $sender[0]->token;
        }
        $now = time();
        $mess = new ConfigMessage();

        if(empty($request->user))
            $mess->user = null;
        else
            $mess->user = $request->user;

        if(empty($request->sender) || $sender->count() == 0)
            return response([ 'Status' => 'Error',
            'Message' => 'Podaj poprawna wartosc sender']);
        else
            $mess->sender = $user;

        if(empty($request->message))
            return response([ 'Status' => 'Error', 'Message' => 'Podaj tresc wiadomosci']);
        else
            $mess->message = $request->message;

        if(empty($request->receiver))
            return response([ 'Status' => 'Error', 'Message' => 'Podaj odbiorce']);
        else
            $mess->receiver = $request->receiver;

        if(!isset($request->time))
        {
            if ($sender->count() == 0)
            {
                $mess->status = 0;
            }
            else
            {
                $mess->status = 1;
            }
            $mess->time = Carbon::now();
        }
        else
        {
            $date = strtotime($request->time);
            if($date-$now > 0)
            {
                if ($sender->count() == 0)
                    $mess->status = 0;
                else
                    $mess->status = 2;
                $mess->time = $request->time;
            }  
            else
            {
                if ($sender->count() == 0)
                    $mess->status = 0;
                else
                    $mess->status = 1;
                $mess->time = Carbon::now();
            }
        }
       
        $mess->save();
        if($mess->status == 1)
        {
            $send = $this->send($token, $request->message, $request->receiver);
            if($send == 0)
            {
                ConfigMessage::where('receiver', $request->receiver)->where('message', $request->message)->where('time', $mess->time)->update(['status' => 0]);
                return response([ 'Status' => 'Error', 'Message' => 'Podaj poprawnego odbiorce']);
            }
        }
        return response([ 'Status' => 'OK']);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConfigMessage  $configMessage
     * @return \Illuminate\Http\Response
     */
    public function show(ConfigMessage $configMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfigMessage  $configMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigMessage $configMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConfigMessage  $configMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfigMessage $configMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfigMessage  $configMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfigMessage $configMessage)
    {
        //
    }
}