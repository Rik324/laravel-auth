<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\QuotationRequested;
use App\Models\QuotationRequest;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the form data
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'quantity_kg' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'transport_mode' => 'required|string|in:Sea,Air',
        ]);

        // 2. Save the request to your database
        $quotationRequest = QuotationRequest::create($validated);

        // 3. Send the email to YOURSELF
        Mail::to('your-business-email@example.com')->send(new QuotationRequested($quotationRequest));

        // 4. Redirect the user back with a success message
        return back()->with('success', 'Thank you! Your quotation request has been sent.');
    }
}

class QuotationController extends Controller
{
    //
}
