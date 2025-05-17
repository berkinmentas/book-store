@extends('layouts.layout')
@section('content')
    <section class="container mx-auto my-5  min-h-screen">
        <div
            class="banner h-96 shadow-lg flex items-center justify-center bg-gradient-to-r from-indigo-600 to-indigo-500 text-white rounded-xl">
            <div class="w-96 h-96">
                <img class="h-full w-full"
                     src="{{\Illuminate\Support\Facades\Vite::asset("resources/images/book.png")}}" alt="book image">
            </div>
            <div class="font-extrabold text-[4rem] text-white">
                <div>{{$category->title}}</div>
                <div>Kategorisi</div>
                <div>Kitaplari</div>
            </div>
        </div>
        <div class="container mx-auto px-4 py-12">
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">En Çok Satan Kitaplar</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($books as $book)
                    <div class="bg-white shadow-md py-3 rounded-xl overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img src="{{$book->getFirstMediaUrl('book_cover')}}" alt="Kitap" class="w-full h-64 object-cover rounded-xl  overflow-hidden">
                        <div class="p-4 roundex-xl">
                            <a href="{{route('bookDetail', $book->id)}}">
                                <h3 class="font-semibold mb-1 text-gray-800">{{$book->title}}</h3>
                            </a>
                            <p class="text-sm text-gray-600 mb-2">{{$book->author}}</p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-blue-600">{{ $book->price }} ₺</span>
                                <div class="flex items-center">
                                            <span class="text-yellow-500 mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            </span>
                                    <span class="text-gray-700">{{ rand(30, 50) / 10 }}</span>
                                </div>
                            </div>
                            <button  data-id="{{ $book->id }}" class="add-to-cart w-full mt-3 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                Sepete Ekle
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
