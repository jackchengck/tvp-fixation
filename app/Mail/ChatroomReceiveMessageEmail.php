<?php

    namespace App\Mail;

    use App\Models\Booking;
    use App\Models\InstantMessage;
    use App\Models\Order;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Address;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;

    class ChatroomReceiveMessageEmail extends Mailable
    {
        use Queueable, SerializesModels;

        public $instantMessage;
        public $url;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct(InstantMessage $instantMessage,)
        {
            //
            $this->instantMessage = $instantMessage;
            $this->url = "https://message." . $this->instantMessage->business->solutionIntegrator->domain . "/v2/" . $this->instantMessage->business->subdomain . "/" . $this->instantMessage->chatroom->chatroom_token;

        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope()
        {
            return new Envelope(
                from:    new Address('do-not-reply@' . $this->instantMessage->business->solutionIntegrator->domain, 'Do not reply'),
                subject: 'New Message Received ' . $this->instantMessage->business->title,

            );
        }

        /**
         * Get the message content definition.
         *
         * @return \Illuminate\Mail\Mailables\Content
         */
        public function content()
        {
            return new Content(

                view: 'mails.chatroom_message_received',
                with: [
                          'instantMessage' => $this->instantMessage,
                          'url' => $this->url,

                          //                          'new_status' => $this->value
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
            return [];
        }
    }
