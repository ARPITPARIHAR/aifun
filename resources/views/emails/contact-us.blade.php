<!DOCTYPE html>
<html>
<head>
    <title>New Contact Query</title>
</head>
<body>
    <h1>New Contact Query</h1>
    
    <p>Hello Admin,</p>
    
    <p>You have received a new query from the contact form on your website. Here are the details:</p>
    
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Phone:</strong> {{ $phone }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Message:</strong> {!! $user_query !!}</p>
    
    <p>Please respond to this query at your earliest convenience.</p>
    
    <p>Thank you,<br>
    The {{ env('APP_NAME') }} Team</p>
</body>
</html>
