<?php

    namespace App\Mail;

    use App\Models\Business;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Address;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;

    class CustomEmail extends Mailable
    {
        use Queueable, SerializesModels;

        protected $business;
        protected $mail_to;
        protected $mail_subject;
        protected $mail_content;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct(Business $business, $mail_to, $mail_subject, $mail_content)
        {
            //
            $this->business = $business;
            $this->mail_to = $mail_to;
            $this->mail_subject = $mail_subject;
            $this->mail_content = $mail_content;

        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope()
        {

            return new Envelope(
                from: new Address('do-not-reply@' . $this->business->solutionIntegrator->domain, 'Do not reply'),
                subject: $this->mail_subject,
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
                          'content' => $this->mail_content,
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
