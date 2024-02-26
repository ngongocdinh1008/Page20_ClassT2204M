<html>
<head>
    <title>Library</title>
</head>
<body>
    <h1>Book Library</h1>

    <form action="/books/search" method="GET">
        <input type="text" name="search" placeholder="Search by title">
        <button type="submit">Search</button>
    </form>

    <ul>
    @foreach ($books as $book)
    <p>{{ $book->title }}</p>
    <p>{{ $book->author }}</p>
    <p>{{ $book->description }}</p>
    @endforeach
    </ul>
</body>
</html>