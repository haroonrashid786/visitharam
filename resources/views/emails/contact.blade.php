<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        h2 {
            color: #444;
        }
        p {
            margin: 10px 0;
        }
        .details {
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>New Contact Message from Visit Haram</h2>
    <p>You have received a new contact message. Here are the details:</p>

    <div class="details">
        <p><strong>First Name:</strong> {{ $data->first_name }}</p>
        <p><strong>Email:</strong> {{ $data->email }}</p>
        <p><strong>Phone Number:</strong> {{ $data->phone_number }}</p>
        <p><strong>Message:</strong> {{ $data->message }}</p>
    </div>

    <p>Please respond to this inquiry at your earliest convenience.</p>
</div>
</body>
</html>
