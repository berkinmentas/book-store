@extends('admin.layouts.layout')
@section('title', __('Kitap Ekle'))
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h4 class="text-xl font-bold mb-6 text-blue-600">{{ __('Kitap Ekle') }}</h4>
                <form class="form" id="newsStore" action="javascript:">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                        <div class="col-span-1 md:col-span-12">
                            <div class="mb-5">
                                <label class="block text-lg font-semibold mb-2" for="title">{{ __('Kitap Adı') }}</label>
                                <input type="text" id="title" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="{{__('Kitap Adı')}}">
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-4">
                            <div class="mb-5">
                                <label class="block text-lg font-semibold mb-2" for="category">{{ __('Kategori') }}</label>
                                <input type="text" id="category" name="category" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="{{__('Kategori')}}">
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-4">
                            <div class="mb-5">
                                <label class="block text-lg font-semibold mb-2" for="author">{{ __('Yazar') }}</label>
                                <input type="text" id="author" name="author" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="{{__('Yazar')}}">
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-4">
                            <div class="mb-5">
                                <label class="block text-lg font-semibold mb-2" for="price">{{ __('Fiyat') }}</label>
                                <input type="text" id="price" name="price" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="{{__('Fiyat')}}">
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-4">
                            <div class="mb-5">
                                <label class="block text-lg font-semibold mb-2" for="publisher">{{ __('Yayınevi') }}</label>
                                <input type="text" id="publisher" name="publisher" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="{{__('Yayınevi')}}">
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-4">
                            <div class="mb-5">
                                <label class="block text-lg font-semibold mb-2" for="year">{{ __('Basım Yılı') }}</label>
                                <input type="text" id="year" name="year" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="{{__('Basım Yılı')}}">
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-4">
                            <div class="mb-5">
                                <label class="block text-lg font-semibold mb-2" for="page_count">{{ __('Sayfa Sayısı') }}</label>
                                <input type="text" id="page_count" name="page_count" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="{{__('Sayfa Sayısı')}}">
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-12">
                            <div class="mb-5">
                                <label class="block text-lg font-semibold mb-2" for="short_description">{{ __('Kısa Açıklama') }}</label>
                                <textarea id="short_description" name="short_description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 tinyMce" style="max-height: 60px"></textarea>
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-12">
                            <div class="mb-5">
                                <label class="block text-lg font-semibold mb-2" for="description">{{ __('Detaylı Açıklama') }}</label>
                                <textarea id="description" name="description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 tinyMce" style="max-height: 60px"></textarea>
                            </div>
                        </div>


                        <div class="col-span-1 md:col-span-12">
                            <div class="mb-5">
                                <div class="block text-lg font-semibold mb-2">{{ __('Kitap Resmi') }}</div>
                                @include('admin.includes._dropzone-single', ['title' => '', 'count' => '-1', 'type' => 'book_cover', 'mimes' => ['image/jpeg', 'image/jpg', 'image/png', 'image/webp']])
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end pt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-300 flex items-center">
                            <span class="spinner-border spinner-border-sm mr-2 btn-spinner hidden" role="status" aria-hidden="true"></span>
                            {{ __('Oluştur') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js-stack')
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                let $contractsStoreForm = $("form#newsStore");

                $contractsStoreForm.on("submit", async function (e) {
                    e.preventDefault();

                    $contractsStoreForm.find("button[type=submit]").attr("disabled", "disabled");
                    $contractsStoreForm.find(".btn-spinner").removeClass("hidden");

                    setTimeout(() => {
                        $.ajax({
                            url: '{{ route('admin.books.store') }}',
                            method: 'POST',
                            data: $contractsStoreForm.serialize(),
                            success: function () {
                                window.location = "{{ route('admin.books.index') }}";
                            },
                            error: function (e) {
                                $contractsStoreForm.find("button[type=submit]").removeAttr("disabled");
                                $contractsStoreForm.find(".btn-spinner").addClass("hidden");
                                ajaxDefaultErrorCallback(e);
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
@endsection
