@extends('layouts.layout')
@section('content')
    <section class="container mx-auto my-5 min-h-screen">
        <div class="container mx-auto px-4 py-12">
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6">
                    <div class="flex justify-center items-center h-36">
                        <img src="{{ $book->getFirstMediaUrl('book_cover')}}"
                             alt="Kitap Görseli"
                             class=" h-full object-cover rounded-xl shadow-md">
                    </div>
                    <div class="grid grid-cols-2">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $book->title}}</h1>
                            <div class="flex items-center mb-4">
                                <div class="flex mr-4">
                                    @for($i = 0; $i < rand(1,5); $i++)
                                        <span class="text-yellow-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </span>
                                    @endfor
                                    @if(($book->rating ?? 4) - rand(1,5) ?? 4) >= 0.5)
                                        <span class="text-yellow-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </span>
                                    @endif
                                    <span class="text-gray-700 ml-1">{{ $book->rating ?? rand(1,5) }}/5</span>
                                </div>
                            </div>
                            <div class="mb-4 ">
                                <p class="text-gray-600 text-sm md:text-lg">
                                    <span class="font-semibold">Yazar:</span> {{ $book->author}}
                                </p>
                                <p class="text-gray-600 text-sm md:text-lg">
                                    <span class="font-semibold">Sayfa Sayısı:</span> {{ $book->pages }} sayfa
                                </p>
                                <p class=" text-gray-600 text-sm md:text-lg">
                                    <span class="font-semibold">Kategori:</span> {{ $book->category->title }}
                                </p>
                            </div>
                        </div>


                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Kitap Özeti</h3>
                            <p class="text-gray-600 leading-relaxed text-sm md:text-lg">
                                {{ $book->description }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-auto">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-3xl font-bold text-blue-600">{{ $book->price }} ₺</span>
                        </div>

                        <div class="flex gap-4">
                            <button
                                class="flex-1 bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300 font-semibold">
                                Sepete Ekle
                            </button>
                            <button
                                class="flex-1 bg-gray-200 text-gray-800 py-3 px-6 rounded-lg hover:bg-gray-300 transition duration-300 font-semibold">
                                Favorilere Ekle
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-6 border-t border-gray-200 mt-8">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Benzer Kitaplar</h2>
                    <div class="swiper bestsellers-slider">
                        <div class="swiper-wrapper">
                            @foreach ($books as $book)
                                <div class="swiper-slide py-5">
                                    <div class="bg-white shadow-md py-3 rounded-xl overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                        <img src="{{$book->getFirstMediaUrl('book_cover')}}" alt="Kitap" class="w-full h-64 object-cover rounded-xl  overflow-hidden">
                                        <div class="p-4 roundex-xl">
                                            <a href="{{route('bookDetail', $book->id)}}">
                                                <h3 class="font-semibold mb-1 text-gray-800">{{$book->title}}</h3>
                                            </a>
                                            <p class="text-sm text-gray-600 mb-2">{{$book->author}}</p>
                                            <div class="flex justify-between items-center">
                                                <span class="font-bold text-blue-600">{{$book->price }} ₺</span>
                                                <div class="flex items-center">
                                            <span class="text-yellow-500 mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </span>
                                                    <span class="text-gray-700">{{ rand(30, 50) / 10 }}</span>
                                                </div>
                                            </div>
                                            <button class="w-full mt-3 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">Sepete Ekle</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next bestsellers-next"></div>
                        <div class="swiper-button-prev bestsellers-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
