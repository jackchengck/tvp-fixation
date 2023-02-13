<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatroomRequest;
use App\Http\Requests\UpdateChatroomRequest;
use App\Models\Chatroom;

class ChatroomController extends Controller
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

    public function getChatroom($request)
    {


        $customerName = $request->input('name');
        $customerEmail = $request->input('email');
        $customerPhone = $request->input('phone');
        $password = $request->input('password');

//        return "Chatroom creating";

        $result = 'not found';

        return response()->json([
            'data' => [
                'found' => [
                    'name' => $customerName,
                    'email' => $customerEmail,
                    'phone' => $customerPhone,
                    'pw' => $password,
                ],
                'result' => $result,
                
            ]
        ]);
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
     * @param \App\Http\Requests\StoreChatroomRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatroomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Chatroom $chatroom
     * @return \Illuminate\Http\Response
     */
    public function show(Chatroom $chatroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Chatroom $chatroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Chatroom $chatroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateChatroomRequest $request
     * @param \App\Models\Chatroom $chatroom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatroomRequest $request, Chatroom $chatroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Chatroom $chatroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chatroom $chatroom)
    {
        //
    }
}
