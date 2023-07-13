<?php

    namespace App\Mail;

    use App\Models\Booking;
    use App\Models\Order;
    use Barryvdh\DomPDF\Facade\Pdf;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Address;
    use Illuminate\Mail\Mailables\Attachment;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;

    class OrderInvoiceEmail extends Mailable
    {
        use Queueable, SerializesModels;

        public $order;
        public $user;

        /**
         * Create a new message instance.
         *
         * @param Booking
         * @return void
         */
        public function __construct(Order $order, $user)
        {
            //
            $this->order = $order;
            $this->user = $user;
        }

        /**
         * Get the message envelope.
         *
         * @return \Illuminate\Mail\Mailables\Envelope
         */
        public function envelope()
        {
            return new Envelope(
                from: new Address('do-not-reply@' . $this->order->business->solutionIntegrator->domain, 'Do not reply'),
                subject: 'Order #' . $this->order->order_num . ' Invoice',
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
                view: 'emails.order_invoice',
                with: [
                          'order' => $this->order,
                          'type'  => 'Invoice',

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


            $pdf = Pdf::loadView(
                'doc_template.pdf.customer_invoice', [
                                                       'title'    => "Order Invoice #" . $this->order->order_num,
                                                       'curUser'  => $this->user,
                                                       'data'     => $this->order,
                                                       'dateTime' => date("Y-m-d h:i:s a"),
                                                   ]
            );

            return [
                Attachment::fromData(fn() => $pdf->output(), "Order Invoice #" . $this->order->order_num)
                    ->withMime('application/pdf'),
            ];
        }
    }
