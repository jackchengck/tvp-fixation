<?php

namespace App\Http\Controllers;

use App\Events\InstantMessageEvent;
use App\Http\Requests\StoreInstantMessageImageRequest;
use App\Http\Requests\StoreInstantMessageRequest;
use App\Http\Requests\UpdateInstantMessageRequest;
use App\Http\Resources\InstantMessageCollection;
use App\Models\Chatroom;
use App\Models\InstantMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InstantMessageController extends Controller
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
     * @param \App\Http\Requests\StoreInstantMessageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstantMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\InstantMessage $instantMessage
     * @return \Illuminate\Http\Response
     */
    public function show(InstantMessage $instantMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\InstantMessage $instantMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(InstantMessage $instantMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateInstantMessageRequest $request
     * @param \App\Models\InstantMessage $instantMessage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstantMessageRequest $request, InstantMessage $instantMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\InstantMessage $instantMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstantMessage $instantMessage)
    {
        //
    }

    public function retrieveMessage(Request $request)
    {
        $token = $request->input('token');
        $chatroom = Chatroom::where('chatroom_token', $token)->first();

        if(!$chatroom){
            return response()->json([
                'data'=>[
                    'chatroom' => null,
                ]
            ]);
        }

//        $messages = InstantMessage::
        $messages = new InstantMessageCollection(InstantMessage::where('chatroom_id', $chatroom->id)->orderBy('created_at')->get());
//        return new InstantMessageCollection(InstantMessage::where())

        return response()->json([
            'data' => [
                'status' => 'Message Sent',
                'chatroom' => $chatroom,
                'messages' => $messages,
            ]
        ]);
    }

    public function sendMessage(Request $request)
    {
        $token = $request->input('token');

        $chatroom = Chatroom::where('chatroom_token', $token)->first();

//        $getFromCustomer = [
//            'token' => $request->input('token'),
//            'content' => $request->input('content'),
//            'content_type' => $request->input('content_type'),
//            'sender_type' => $request->input('sender_type')
//        ];
//
//        $messageCustomerSample = [
//            'business_id' => $chatroom->business_id,
//            'chatroom_id' => $chatroom->id,
//            'user_id' => null,
//            'sender_type' => 'customer',
//            'content_type' => 'text',
//            'content' => "Sample Message",
//            'image_url' => null,
//            'record_url' => null,
//        ];
//
//        $messageAdminSample = [
//            'business_id' => $chatroom->business_id,
//            'chatroom_id' => $chatroom->id,
//            'user_id' => null,
//            'sender_type' => 'admin',
//            'content_type' => 'text',
//            'content' => "Sample Message",
//            'image_url' => null,
//            'record_url' => null,
//        ];

        $message = new InstantMessage();
        $message->business_id = $chatroom->business_id;
        $message->chatroom_id = $chatroom->id;
        $message->sender_type = $request->input('sender_type');
        $message->content = $request->input('content');
        $message->content_type = $request->input('content_type');
        $message->save();

        event(new InstantMessageEvent($chatroom, $message));

        return response()->json([
            'data' => [
                'status' => 'Message Sent',
                'chatroom' => $chatroom,
                'message' => $message,

            ]
        ]);
    }


    public function sendImageMessage(Request $request)
    {
        /*
         * INPUT
         *
         * token
         * sender_type : customer
         * content_type : image
         * image
         *
         */

        $token = $request->input('token');
        $chatroom = Chatroom::where('chatroom_token', $token)->first();

        $destination_path = 'uploads/instant-message/image';

        $validatedData['image'] = $request->file('image')->store($destination_path, 'public');

        $public_destination_path = 'storage/' . $validatedData['image'];


        $message = new InstantMessage();
        $message->business_id = $chatroom->business_id;
        $message->chatroom_id = $chatroom->id;
        $message->sender_type = $request->input('sender_type');
//        $message->content = $request->input('content');
        $message->content_type = $request->input('content_type');
        $message->image_url = $public_destination_path;
        $message->save();

        event(new InstantMessageEvent($chatroom, $message));


        return response()->json([
            'data' => [
                'status' => 202,
                'image_url' => $public_destination_path,
                'message' => $message,

            ]
        ]);
    }

    public function sendVoiceMessage(Request $request)
    {
        $token = $request->input('token');
        $chatroom = Chatroom::where('chatroom_token', $token)->first();

        $destination_path = 'uploads/instant-message/voice-record';


        $validatedData['record'] = $request->file('record')->store($destination_path, 'public');

        $public_destination_path = 'storage/' . $validatedData['record'];


        $message = new InstantMessage();
        $message->business_id = $chatroom->business_id;
        $message->chatroom_id = $chatroom->id;
        $message->sender_type = $request->input('sender_type');
//        $message->content = $request->input('content');
        $message->content_type = $request->input('content_type');
        $message->record_url = $public_destination_path;
        $message->save();

        event(new InstantMessageEvent($chatroom, $message));


        return response()->json([
            'data' => [
                'status' => 202,
                'record_url' => $public_destination_path,
                'message' => $message,

            ]
        ]);
    }
}
