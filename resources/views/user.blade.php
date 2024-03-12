<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
        @foreach($users as $user)
            @if($user['id'] == $id)
                <h3>User Information</h3>
                <p>ID: {{ $user['id'] }}</p>
                <p>Name: {{ $user['name'] }}</p>
                <p>Gender: {{ $user['gender'] }}</p>
            @endif
        @endforeach
    
</body>
</html>
