<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagingController extends Controller
{
        /**
     * @return mixed
     */
    public function index()
    {
        $msgs=Message::get();
        return $msgs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'sujet' => 'required',
            'message' => 'required',

        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->sujet = $request->sujet;
        $message->message = $request->message;
        $message->save();

        return $request;

    }
}
