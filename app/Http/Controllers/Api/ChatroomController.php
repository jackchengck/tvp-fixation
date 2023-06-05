<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreChatroomRequest;
    use App\Http\Requests\UpdateChatroomRequest;
    use App\Http\Resources\ChatroomResource;
    use App\Models\Chatroom;
    use App\Models\InstantMessage;
    use Carbon\Carbon;
    use http\Env\Response;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Str;

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

        public function getChatroom(Request $request)
        {
            $customerName = $request->input('name');
            $customerEmail = $request->input('email');
            $customerPhone = $request->input('phone');
            $password = $request->input('password');
            $business = $request->input('business');

            $business = \App\Models\Business::where('subdomain', $business)->first();

//        return "Chatroom creating";

            if ($business == null) {
                return abort(404);
            }
//        $newToken = Str::random(30);

            do {
                $newToken = Str::random(30);
            } while (Chatroom::where('chatroom_token', $newToken)->first());


            $chatroom = Chatroom::firstOrCreate(
                [
                    'customer_email'    => $customerEmail,
                    'customer_password' => $password,
                    'business_id'       => $business->id,
                ], [
                    'customer_name'  => $customerName,
                    //            'customer_email' => $customerEmail,
                    'customer_phone' => $customerPhone,
                    //            'customer_password' => $password,
//                    'business_id'    => $business->id,
                    'chatroom_token' => $newToken,
                ]
            );

            $chatroom->chatroom_token = $newToken;

            $chatroom->save();


            $result = 'not found';

            $chat = new ChatroomResource($chatroom);

            return response()->json(
                [
                    'data' => [
                        'found'    => [
                            'name'  => $customerName,
                            'email' => $customerEmail,
                            'phone' => $customerPhone,
                            'pw'    => $password,
                        ],
                        'result'   => $result,
                        'chatroom' => $chatroom,
                        'chat'     => $chat,
                        'token'    => $newToken,
                    ]
                ]
            );
        }

        public function endChatWithMail(Request $request)
        {
            $token = $request->input('token');
            $chatroom = Chatroom::where('chatroom_token', $token)->first();

            Mail::to($chatroom->customer_email)->cc($chatroom->business->email)->queue(new \App\Mail\ChatEndWithChatRecord($chatroom));

            return ("Email Sent");
        }


        public function downloadChatroomHistory($id)
        {
//        $chatroomId = $request->input('chatroom');

//        $chatroom = Chatroom::with('id', $chatroomId)->first();
            $chatroom = Chatroom::findOrFail($id);

//        if()

            $businessSubdomain = $chatroom->business->subdomain;
            $domain = $chatroom->business->solutionIntegrator->domain;
            $link = "https://message." . $domain . "/" . $businessSubdomain;
//        $messages = InstantMessage::with('chatroom_id', $chatroom->id)->get();
            $messages = $chatroom->instantMessages;

            $content = "History Logs \n";
            $content .= "Customer Name: " . $chatroom->customer_name . " \n";
            $content .= "Customer Email: " . $chatroom->customer_email . " \n";
            $content .= "Customer Phone: " . $chatroom->customer_phone . " \n";
            $content .= "Customer Chatroom Password: " . $chatroom->customer_password . " \n";

            $content .= "\n\n";
            $content .= "-- Chat History Beginning --";
            $content .= "\n\n";
            foreach ($messages as $message) {
                $content .= "[ " . $message->created_at . " ]\n";
                if ($message->sender_type == 'admin') {
                    $content .= "Admin: ";
                } else {
                    $content .= "Customer " . $chatroom->customer_name . ": ";
                }
                if ($message->content_type == 'text') {
                    $content .= " " . $message->content . " \n";
                } elseif ($message->content_type == 'image') {
                    $content .= " Image Message: Url[ " . $link . "/" . $message->image_url . "] \n";
                } elseif ($message->content_type == 'voice') {
                    $content .= " Voice Message: Url[ " . $link . "/" . $message->record_url . "] \n";
                }
                $content .= "\n";
            }
            $content .= "\n \n";
            $content .= "-- Chat History Ended --";

            $fileName = "Chat History" . Carbon::now() . ".txt";

            $headers = [
                'Content-type'        => 'text/plain',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
                'Content-Length'      => strlen($content),
            ];

//        return Response::make($content, 200, $headers);

            return response($content)->withHeaders($headers);

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
         * @return JsonResponse
         */
        public function show($id, Request $request)
        {
            $token = $request->input('token');
            $chatroom = Chatroom::where('id', $id)->where('chatroom_token', $token)->first();
            //

            return response()->json(
                [
                    'data' => [
                        'chatroom' => $chatroom,
                    ]
                ]
            );

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
