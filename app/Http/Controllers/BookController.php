<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show(Book $book)
    {
        $books = Book::where('category_id', $book->category_id)->with('user')->get();
        return view('book-detail', [
            'book' => $book,
            'books' => $books,
        ]);
    }
}
