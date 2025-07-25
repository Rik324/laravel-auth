<!DOCTYPE html>
<html>
<head>
    <title>New Quotation Request</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { padding: 20px; border: 1px solid #ddd; border-radius: 5px; max-width: 600px; margin: 20px auto; background-color: #f9f9f9; }
        h1 { color: #000; }
        hr { border: 0; border-top: 1px solid #eee; margin: 20px 0; }
        p { margin: 10px 0; }
        strong { min-width: 150px; display: inline-block; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Quotation Request</h1>
        <p>You have received a new quotation request with the following details:</p>
        <hr>
        <p><strong>Product:</strong> {{ $quotationRequest->product_name }}</p>
        <p><strong>Customer Name:</strong> {{ $quotationRequest->customer_name }}</p>
        <p><strong>Email:</strong> {{ $quotationRequest->email }}</p>
        <p><strong>Phone Number:</strong> {{ $quotationRequest->phone_number }}</p>
        <p><strong>Quantity:</strong> {{ $quotationRequest->quantity_kg }} kg</p>
        <p><strong>Destination:</strong> {{ $quotationRequest->destination }}</p>
        <p><strong>Transport Mode:</strong> {{ $quotationRequest->transport_mode }}</p>
    </div>
</body>
</html>