<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Form submitted successfully!</h2>

    <div class="alert alert-success">
        Your form has been submitted successfully.
    </div>

    <h3>Saved Data:</h3>
    <ul>
        <li><strong>First Name:</strong> {{ session('firstname') }}</li>
        <li><strong>Last Name:</strong> {{ session('lastname') }}</li>
        <li><strong>Description:</strong> {{ session('description') }}</li>
        <li><strong>Language:</strong> {{ session('lang') }}</li>
    </ul>

    <a href="{{ route('form', app()->getLocale()) }}" class="btn btn-primary">Back to Form</a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
