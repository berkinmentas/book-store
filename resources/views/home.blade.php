@extends('layouts.layout')
@section('content')
    <section class="container mx-auto my-5">
        <div class="banner h-96 shadow-lg flex items-center justify-center">
            <div class="w-96 h-96">
                <img class="h-full w-full"
                     src="{{\Illuminate\Support\Facades\Vite::asset("resources/images/book.png")}}" alt="book image">
            </div>
            <div class="font-extrabold text-[4rem] text-[#1F2939]">
                <div class="text-[#1F2939]">
                    Yenilikçi
                </div>
                <div class="text-[#1F2939]">
                    2. El Kitap
                </div>
                <div class="text-[#1F2939]">
                    Satış Noktası
                </div>
            </div>
        </div>
    </section>
@endsection
