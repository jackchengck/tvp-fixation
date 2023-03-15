<?php

    namespace App\Mail;

    use App\Models\Chatroom;
    use Carbon\Carbon;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Address;
    use Illuminate\Mail\Mailables\Attachment;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;

    class ChatEndWithChatRecord extends Mailable
    {
        use Queueable, SerializesModels;

        protected $chatroom;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct(Chatroom $chatroom)
        {
            //
            $this->chatroom = $chatroom;

        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope()
        {
//        return new Envelope(
//            subject: 'Chat End With Chat Record',
//        );

            return new Envelope(
                from: new Address('do-not-reply@' . $this->chatroom->business->solutionIntegrator->domain, 'Do not reply'),
                subject: 'Chat ended. Chatroom history attached',
            );
        }

        /**
         * Get the message content definition.
         *
         * @return \Illuminate\Mail\Mailables\Content
         */
        public function content()
        {
//        return new Content(
//            view: 'view.name',
//        );

            return new Content(
                view: 'emails.chat_end_with_chat_record',
                with: [
                          'chatroom' => $this->chatroom,
                      ],
            );
        }

        /**
         * Get the attachments for the message.
         *
         * @return array
         */
        public function attachments()
        {
            $businessSubdomain = $this->chatroom->business->subdomain;
            $domain = $this->chatroom->business->solutionIntegrator->domain;
            $link = "https://message." . $domain . "/" . $businessSubdomain;
            $messages = $this->chatroom->instantMessages;

            $content = "History Logs \n";
            $content .= "Customer Name: " . $this->chatroom->customer_name . " \n";
            $content .= "Customer Email: " . $this->chatroom->customer_email . " \n";
            $content .= "Customer Phone: " . $this->chatroom->customer_phone . " \n";
            $content .= "Customer Chatroom Password: " . $this->chatroom->customer_password . " \n";

            $content .= "\n\n";
            $content .= "-- Chat History Beginning --";
            $content .= "\n\n";
            foreach ($messages as $message) {
                $content .= "[ " . $message->created_at . " ]\n";
                if ($message->sender_type == 'admin') {
                    $content .= "Admin: ";
                } else {
                    $content .= "Customer " . $this->chatroom->customer_name . ": ";
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

            return [
                Attachment::fromData(fn() => $content, $fileName)->withMime('text/plain')
            ];
        }
    }
