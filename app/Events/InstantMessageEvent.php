<?php

namespace App\Events;

use App\Models\Chatroom;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InstantMessageEvent implements ShouldBroadcast
{

    public $message;
    /**
     * The Chatroom instance
     *
     * @var Chatroom
     *
     */
    public $chatroom;

    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($chatroom, $message,)
    {
        //
        $this->chatroom = $chatroom;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('chatroom.' . $this->chatroom->id . "." . $this->chatroom->chatroom_token);
//        return new Channel('chatroom.' . $this->chatroom->id . "." . $this->chatroom->chatroom_token);
        return new Channel('chatroom.' . $this->chatroom->chatroom_token);
    }

    public function broadcastAs()
    {
        return 'message';
    }

}
