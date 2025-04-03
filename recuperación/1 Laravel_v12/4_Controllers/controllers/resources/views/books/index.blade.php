<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body>
    <h1>Mis Libros</h1>
    <ul>
        @forelse ($books as $book)
            <li>{{$book->title}} || Escrito por: {{$book->author}}</li>
        @empty
            <li>La lista de libros esta vacía</li>   
        @endforelse

    </ul>
</body>
</html>