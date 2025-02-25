<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Relaciones</title>
    </head>
    <body>
        <h1>{{ $user->name }}</h1>
        <h1>{{ $user->email }}</h1>

        <h2>Datos relacionados a través de foreign key</h2>
        <h3>Phones:</h3>
            @foreach ($user->phones as $phone)
                <ul>
                    <li>{{ $phone->prefix }} {{ $phone->phone_number }}</li>
                </ul>
            @endforeach
    </body>
</html>