<?php

namespace App\Http\Controllers;

use App\Mail\QuotationRequested;
use App\Models\QuotationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming form data
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'quantity_kg' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'transport_mode' => 'required|string|in:Sea,Air',
        ]);

        // 2. Save the validated request to your database
        $quotationRequest = QuotationRequest::create($validated);

        // 3. Send the email notification to yourself
        // Note: We will create the QuotationRequested Mailable in the next step.
        Mail::to('pinveganex@gmail.com')->send(new QuotationRequested($quotationRequest));

        // 4. Redirect the user back with a success message
        return back()->with('success', 'Thank you! Your quotation request has been sent.');
    }
}