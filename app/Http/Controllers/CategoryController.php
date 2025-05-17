<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        $books = Book::where('category_id', $category->id)->get();
        return view('category',[
            'books' => $books,
            'category' => $category,
        ]);
    }
}
