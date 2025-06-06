@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vinove</title>
</head>
@section('index')
<body class="bodyy">
    <div class="container">
        <div class="brand">Welcome To Vinove</div>
        <div class="subtitle">Innovative Software &amp; Services for Modern Businesses</div>
        <div class="btn-group">
            <a href="/signin" class="btn btn-login">Login</a>
            <a href="/signup" class="btn btn-signup">Sign Up</a>
        </div>
        <div class="cta">Join us today and take your business to the next level!</div>
    </div>
</body>
@endsection
</html>