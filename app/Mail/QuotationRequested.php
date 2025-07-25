<?php

namespace App\Mail;

use App\Models\QuotationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuotationRequested extends Mailable
{
    use Queueable, SerializesModels;

    // Define a public property to hold the quotation request data
    public $quotationRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(QuotationRequest $quotationRequest)
    {
        // Assign the incoming data to our public property
        $this->quotationRequest = $quotationRequest;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Quotation Request for ' . $this->quotationRequest->product_name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Tell Laravel to use this public property in the email view
        return new Content(
            view: 'emails.quotation-requested',
            with: [
                'quotationRequest' => $this->quotationRequest,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}