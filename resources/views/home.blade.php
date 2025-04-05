@extends('layouts.layout')
@section('content')
    <section class="container mx-auto my-5  min-h-screen">
        <div class="banner h-96 shadow-lg flex items-center justify-center bg-gradient-to-r from-indigo-600 to-indigo-500 text-white rounded-xl">
            <div class="w-96 h-96">
                <img class="h-full w-full" src="{{\Illuminate\Support\Facades\Vite::asset("resources/images/book.png")}}" alt="book image">
            </div>
            <div class="font-extrabold text-[2rem] text-white md:text-[3rem] lg:text-[4rem]">
                <div>
                    Yenilikçi
                </div>
                <div>
                    2. El Kitap
                </div>
                <div>
                    Satış Noktası
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 py-12">
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">En Çok Satan Kitaplar</h2>
                <div class="swiper bestsellers-slider">
                    <div class="swiper-wrapper">
                        @for ($i = 1; $i <= 8; $i++)
                            <div class="swiper-slide py-5">
                                <div class="bg-white shadow-md py-3 rounded-xl overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                    <img src="https://picsum.photos/220/300?random={{ $i }}" alt="Kitap {{ $i }}" class="w-full h-64 object-cover rounded-xl  overflow-hidden">
                                    <div class="p-4 roundex-xl">
                                        <h3 class="font-semibold mb-1 text-gray-800">Kitap Başlığı {{ $i }}</h3>
                                        <p class="text-sm text-gray-600 mb-2">Yazar Adı</p>
                                        <div class="flex justify-between items-center">
                                            <span class="font-bold text-blue-600">{{ rand(15, 75) }} ₺</span>
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
                        @endfor
                    </div>
                    <div class="swiper-button-next bestsellers-next"></div>
                    <div class="swiper-button-prev bestsellers-prev"></div>
                </div>
            </div>

            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Yeni Eklenenler</h2>
                <div class="swiper new-arrivals-slider">
                    <div class="swiper-wrapper">
                        @for ($i = 1; $i <= 8; $i++)
                            <div class="swiper-slide py-5">
                                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                    <div class="relative">
                                        <img src="https://picsum.photos/220/300?random={{ $i + 10 }}" alt="Kitap {{ $i }}" class="w-full h-64 object-cover">
                                        <div class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 rounded-bl-lg text-sm font-semibold">
                                            Yeni
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="font-semibold mb-1 text-gray-800">Yeni Kitap {{ $i }}</h3>
                                        <p class="text-sm text-gray-600 mb-2">Yazar Adı</p>
                                        <div class="flex justify-between items-center">
                                            <span class="font-bold text-blue-600">{{ rand(15, 75) }} ₺</span>
                                            <span class="text-sm text-gray-500">{{ rand(1, 10) }} gün önce</span>
                                        </div>
                                        <button class="w-full mt-3 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                            Sepete Ekle
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="swiper-button-next new-arrivals-next"></div>
                    <div class="swiper-button-prev new-arrivals-prev"></div>
                </div>
            </div>

            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Popüler Kategoriler</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach (['Roman', 'Şiir', 'Tarih', 'Bilim', 'Felsefe', 'Kişisel Gelişim', 'Çocuk Kitapları', 'Akademik'] as $category)
                        <a href="#"
                           class="block p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 text-center">
                            <h3 class="font-semibold text-lg text-gray-800">{{ $category }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ rand(50, 500) }} Kitap</p>
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Keşfedilmeyi Bekleyen Kitaplar</h2>
                <div class="swiper discover-slider">
                    <div class="swiper-wrapper">
                        @for ($i = 1; $i <= 8; $i++)
                            <div class="swiper-slide py-5">
                                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                                    <img src="https://picsum.photos/220/300?random={{ $i + 20 }}" alt="Kitap {{ $i }}" class="w-full h-64 object-cover">
                                    <div class="p-4 flex-grow">
                                        <h3 class="font-semibold mb-1 text-gray-800">Random Kitap {{ $i }}</h3>
                                        <p class="text-sm text-gray-600 mb-2">Yazar Adı</p>
                                        <p class="text-sm text-gray-700 mb-3 line-clamp-3">Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua.</p>
                                        <div class="flex justify-between items-center mt-auto">
                                            <span class="font-bold text-blue-600">{{ rand(15, 75) }} ₺</span>
                                            <span class="text-sm text-gray-500">Durum: {{ ['Çok İyi', 'İyi', 'Normal'][rand(0, 2)] }}</span>
                                        </div>
                                        <button class="w-full mt-3 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                            Sepete Ekle
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="swiper-button-next discover-next"></div>
                    <div class="swiper-button-prev discover-prev"></div>
                </div>
                <!--
                <div class="text-center mt-8">
                    <a href="#" class="inline-block px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition duration-300">
                        Daha Fazla Kitap Gör
                    </a>
                </div>
                -->
            </div>
        </div>
    </section>
@endsection
