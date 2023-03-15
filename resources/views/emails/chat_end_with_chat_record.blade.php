<div>
    <div>
        Dear {{$chatroom->customer_name}}:
    </div>
    <br>
    <div>
        Chatroom created for {{$chatroom->business->title}} has finished.
    </div>
    <br>
    <div>
        Attached the record for the chat.
    </div>
    <div>
        Thank you for choosing our service.
    </div>
    <div>
        Thank you.
    </div>
    <br>

    <div>
        Your Sincerely,
    </div>
    <div>
        {{$chatroom->business->title}}
    </div>
</div>

<?php>

