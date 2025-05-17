@extends('admin.layouts.layout')
@section('title', 'Kitap Güncelle')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form id="bookUpdate">
                <h3 class="text-xl font-bold text-blue-600 mb-6">Kitap Güncelle</h3>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                    <div class="col-span-1 md:col-span-12">
                        <div class="mb-5">
                            <label class="block text-lg font-semibold mb-2" for="title">{{ __('Kitap Adı') }}</label>
                            <input type="text" id="title" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{$book->title}}">
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-6">
                        <div class="mb-5">
                            <label class="block text-lg font-semibold mb-2" for="category">{{ __('Kategori') }}</label>
                            <select class="form-select input-tags" id="category_id" name="category_id">
                                <option value="">{{ __('Seçiniz') }}</option>
                                @foreach($categories as $category)
                                    <option {{$category->id == $book->category_id ? 'selected' : ''}} value="{{ $category->id }}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-6">
                        <div class="mb-5">
                            <label class="block text-lg font-semibold mb-2" for="author">{{ __('Yazar') }}</label>
                            <input type="text" id="author" name="author" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{$book->author}}">
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-4">
                        <div class="mb-5">
                            <label class="block text-lg font-semibold mb-2" for="publisher">{{ __('Yayınevi') }}</label>
                            <input type="text" id="publisher" name="publisher" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{$book->publisher}}">
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-4">
                        <div class="mb-5">
                            <label class="block text-lg font-semibold mb-2" for="year">{{ __('Basım Yılı') }}</label>
                            <input type="text" id="year" name="year" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{$book->year}}">
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-4">
                        <div class="mb-5">
                            <label class="block text-lg font-semibold mb-2" for="page_count">{{ __('Sayfa Sayısı') }}</label>
                            <input type="text" id="page_count" name="page_count" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{$book->page_count}}">
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-12">
                        <div class="mb-5">
                            <label class="block text-lg font-semibold mb-2" for="short_description">{{ __('Kısa Açıklama') }}</label>
                            <textarea id="short_description" name="short_description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 tinyMce" style="max-height: 60px">{{$book->short_description}}</textarea>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-12">
                        <div class="mb-5">
                            <label class="block text-lg font-semibold mb-2" for="description">{{ __('Detaylı Açıklama') }}</label>
                            <textarea id="description" name="description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 tinyMce" style="max-height: 60px">{{$book->description}}</textarea>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-6">
                        <div class="mb-5">
                            <label class="block text-lg font-semibold mb-2" for="price">{{ __('Fiyat') }}</label>
                            <input type="text" id="price" name="price" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{$book->price}}">
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-12">
                        <div class="mb-5">
                            <div class="block text-lg font-semibold mb-2">{{ __('Kitap Kapağı') }}</div>
                            @include('admin.includes._dropzone-single', ['title' => '', 'count' => '-1', 'type' => 'book_cover', 'mimes' => ['image/jpeg', 'image/jpg', 'image/png', 'image/webp']])

                            @if(!empty($book->getMedia('book_cover')) && count($book->getMedia('book_cover')) > 0)
                                <div class="mt-4">
                                    <p class="text-sm text-gray-600 mb-2">Mevcut Kitap Kapağı:</p>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                        <div class="relative group">
                                            <img src="{{ $book->getFirstMediaUrl('book_cover') }}"
                                                 alt="Kitap Kapağı"
                                                 class="w-full h-40 object-cover rounded-md shadow-sm">
                                            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 rounded-md flex items-center justify-center transition-opacity duration-300">
                                                <a href="{{ $book->getFirstMediaUrl('book_cover') }}" target="_blank" class="text-white bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded-md text-sm font-medium">Görüntüle</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-6">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-300 flex items-center">
                        <span class="spinner-border spinner-border-sm mr-2 btn-spinner hidden" role="status" aria-hidden="true"></span>
                        {{ __('Güncelle') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('js-stack')
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                let $bookUpdateForm = $("form#bookUpdate");

                $bookUpdateForm.on("submit", function (e) {
                    e.preventDefault();

                    $bookUpdateForm.find("button[type=submit]").attr("disabled", "disabled");
                    $bookUpdateForm.find(".btn-spinner").removeClass("hidden");

                    $.ajax({
                        url: '{{ route('admin.books.update', ['book' => $book->id]) }}',
                        method: 'PUT',
                        data: $bookUpdateForm.serialize(),
                        success: function () {
                            window.location = "{{ route('admin.books.edit', ['book' => $book->id]) }}";
                        },
                        error: function (e) {
                            $bookUpdateForm.find("button[type=submit]").removeAttr("disabled");
                            $bookUpdateForm.find(".btn-spinner").addClass("hidden");
                            ajaxDefaultErrorCallback(e);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
