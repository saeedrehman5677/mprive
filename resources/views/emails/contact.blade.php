<!DOCTYPE html>
<html>
<head>
    @if($viewingDate)
        <title>Viewing Property Request</title>
    @else
    <title>Contact Form Submission</title>
    @endif
</head>
<body>
<h1>Contact Form Submission</h1>
<p>Full Name: {{ $fullname }}</p>
<p>Phone: {{ $phone }}</p>
@if($viewingDate)
<p>Viewing Date: {{ $viewingDate }}</p>
<p>Viewing Time: {{ $viewingTime }}</p>
@endif
<p>Email: {{ $email }}</p>
<p>Message: {{ $messageContent }}</p>
</body>
</html>
