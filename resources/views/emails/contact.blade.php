<!DOCTYPE html>
<html>

<head>
    <title>Contact Form Revieved</title>
</head>

<body>
    <h1>You have a new message from: {{ $data['name'] }}!</h1>
    <h2>{{$data['subject']}}</h2>
    <h4>{{$data['email']}}</h4>
    <p>{{$data['message']}}</p>
    <p>Reply as soon as you can.</p>
</body>

</html>