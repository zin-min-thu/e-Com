<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KzShop</title>
</head>
<body>
    <h1>{{ $data['title'] }}</h1>

    <p>{{ $data['body'] }}</p>
    <p>Your Name: {{$data['name']}}</p>
    <p>Your Email: {{$data['email']}}</p>
    <p>Password: *****(use password as you assign)</p>
    <p>
        <a href="{{$data['url']}}">Click Here To Login</a>
    </p>

    <p>Thank you</p>
</body>
</html>