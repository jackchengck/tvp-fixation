<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SupplierOrder extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * The order instance.
     *
     * @var \App\Models\SupplierOrder
     */
    protected $supplierOrder;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\SupplierOrder $supplierOrder
     * @return void
     */
    public function __construct(\App\Models\SupplierOrder $supplierOrder)
    {
        //

        $this->supplierOrder = $supplierOrder;

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {

        return new Envelope(
            from: new Address('do-not-reply@' . $this->supplierOrder->business->solutionIntegrator->domain, 'Do not reply'),
            subject: 'Order for products',
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
            view: 'emails.supplier_order_email',
            with: [
            'supplierOrder' => $this->supplierOrder,

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
