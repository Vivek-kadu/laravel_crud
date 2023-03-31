<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="{{route('update.user')}}">
        @csrf
        <input type="text" id="" name="id" value="{{$user->id}}"><br>

        <label for="nm">First name:</label><br>
        <input type="text" id="nm" name="name" value="{{$user->name}}"><br>
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <label for="mail"> email:</label><br>
        <input type="text" id="mail" name="email" value="{{$user->email}}"><br>
        @error('email')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <label for="pass">password: </label><br>
        <input type="password" id="pass" name="password" value="{{$user->password}}"><br><br>
        @error('password')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror

        <input type="submit" value="Submit">
    </form>
</body>

</html>