<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Success</title>
</head>
<body>
    <h1>Form Submitted Successfully!</h1>
    <pre>{{ dd(session()->all()) }}</pre>
    pre
    <p>{{ session('message') }}</p>
    <p>Date: {{ session('date') }}</p>
    <p>Room Size: {{ session('roomSize') }}</p>

</body>
</html>
