<html>
<head>
    <title>Book List</title>
</head>
<body>
    <h1>Book List</h1>
    <div class="search-container">
        <form action="{{ route('books.search') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by title..." class="search-input">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>
    <table border="1">
        <tr>
            <th>Book ID</th>
            <th>Author ID</th>
            <th>Title</th>
            <th>ISBN</th>
            <th>Publication Year</th>
            <th>Available</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->bookid }}</td>
            <td>{{ $book->authorid }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->ISBN }}</td>
            <td>{{ $book->pub_year }}</td>
            <td>{{ $book->available }}</td>
        </tr>
        @endforeach
    </table>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ddd;
        }
        .search-container {
    margin-bottom: 20px;
    text-align: center;
}

.search-form {
    display: inline-block; 
}

.search-input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 5px; 
    width: 200px; 
}

.search-button {
    padding: 8px 16px;
    background-color: #007bff; 
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.search-button:hover {
    background-color: #0056b3;
}
    </style>
</body>
</html>