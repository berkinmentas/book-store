<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Book::findOrFail($id);

        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'image' => $product->getFirstMediaUrl('book_cover'),
                'title' => $product->title,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Ürün sepete eklendi!');
    }

    public function remove($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Ürün sepetten çıkarıldı.');
    }

    public function clear()
    {
        Session::forget('cart');
        return redirect()->back()->with('success', 'Sepet temizlendi.');
    }
}
