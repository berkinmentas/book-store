@extends('admin.layouts.layout')
@section('title', 'Kategori Güncelle')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form id="bookUpdate">
                <h3 class="text-xl font-bold text-blue-600 mb-6">Kategori Güncelle</h3>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                    <div class="col-span-1 md:col-span-12">
                        <div class="mb-5">
                            <label class="block text-lg font-semibold mb-2" for="title">{{ __('Kategori Adı') }}</label>
                            <input type="text" id="title" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{$category->title}}">
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
                        url: '{{ route('admin.categories.update', ['category' => $category->id]) }}',
                        method: 'PUT',
                        data: $bookUpdateForm.serialize(),
                        success: function () {
                            window.location = "{{ route('admin.categories.edit', ['category' => $category->id]) }}";
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
