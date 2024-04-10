<?php

    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Address;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;

    class CottexMail extends Mailable
    {
        use Queueable, SerializesModels;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct()
        {
            //
        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope()
        {
            return new Envelope(
                from:    new Address('do-not-reply@benison.tech', 'Do not reply'),
                subject: 'Cottex預約時間提示',
//Cottex訂單狀態更改通知\


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
                view: 'emails.custom_email',
                with: [
                          'content' =>
                              '你的夢幻星空四件套 訂單編號為：1712736343606 你的預約時間為2024-04-16 16:00.',

                      ]

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
