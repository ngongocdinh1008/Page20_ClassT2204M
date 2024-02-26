<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BooksController;

Route::get('products', [
    ProductsController::class,
    'index'
]);
Route::get('products/{id}', [
    ProductsController::class,
    'detail'
]);
Route::get('/books', [BooksController::class, 'index']);
Route::get('/books/search', [BooksController::class, 'search'])->name('books.search');


