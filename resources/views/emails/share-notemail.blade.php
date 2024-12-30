<!DOCTYPE html>
<html>
<head>
    <title>Note Shared Notification</title>
</head>
<body>
    <h1>A Note Has Been Shared With You!</h1>
    <p>The note titled <strong>{{ $note->title }}</strong> has been shared with you.</p>
    <p>You have been granted <strong>{{ $access }}</strong> access to this note.</p>
    <p>Click <a href="{{ config('app.url') }}">here</a> to view the note.</p>
    <p>Thank you!</p>
</body>
</html>
