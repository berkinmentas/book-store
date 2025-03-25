@extends('layouts.layout')
@section('content')
    <section class="container mx-auto my-5">
        <div class="bg-gradient-to-br from-indigo-50 to-blue-100 min-h-screen flex items-center justify-center p-4">
            <div class="max-w-2xl w-full bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="p-8 md:p-10">
                    <div class="flex justify-center mb-6">
                        <div class="relative">
                            <div class="h-24 w-24 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </div>
                            <div class="absolute -bottom-1 -right-1 h-8 w-8 rounded-full bg-yellow-400 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-2">Geliştirme Aşamasında</h1>

                    <div class="w-16 h-1 bg-blue-500 mx-auto mb-6"></div>

                    <p class="text-gray-600 text-center mb-8">
                        Bu sayfa şu anda aktif olarak geliştiriliyor. Çok yakında burada harika şeyler olacak!
                    </p>

                    <div class="bg-blue-50 rounded-lg p-6 mb-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-800">Tahmini Tamamlanma</h3>
                                <p class="mt-1 text-gray-600">Bu özellik {{ now()->addDays(rand(30, 60))->format('d.m.Y') }} tarihine kadar tamamlanacak.</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <a href="/" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Ana Sayfaya Dön
                        </a>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 md:p-8">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="text-white mb-4 md:mb-0">
                            <h4 class="font-medium text-lg mb-1">Gelişmelerden haberdar olun</h4>
                            <p class="text-blue-100 text-sm">Bu sayfa hazır olduğunda size haber verelim</p>
                        </div>
                        <div class="w-full md:w-auto">
                            <div class="flex">
                                <input type="email" placeholder="E-posta adresiniz" class="w-full px-4 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                <button class="bg-yellow-400 text-yellow-900 font-medium px-4 py-2 rounded-r-lg hover:bg-yellow-300 transition-colors duration-200">
                                    Bilgilendir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
