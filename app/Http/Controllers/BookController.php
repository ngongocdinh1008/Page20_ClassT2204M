<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    public function search(Request $request){
        $searchTerm = $request->input('search');
        $books = Book::where('title', 'LIKE', "%$searchTerm%")
                    ->orWhere('author', 'LIKE', "%$searchTerm%")
                    ->get();
        return view('books.index', compact('books'));
    }

}
