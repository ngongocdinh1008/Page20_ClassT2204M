<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index(){
        $book = Book::all();
        return view('book.index' ,compact('book'));
    }
}
