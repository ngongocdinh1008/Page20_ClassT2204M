<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $books = Book::where('title', 'LIKE', "%$search%")->get();

        return view('books.index', ['books' => $books]);
    }
}
