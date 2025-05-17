@extends('layouts.auth')
@section('content')
    <section class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-lg p-6 mx-auto">
            <div class="bg-white rounded-lg shadow-md p-8">
                <form class="w-full" id="loginForm" enctype="multipart/form-data">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-full flex items-center justify-center mb-6">
                            <div class="text-[2rem] font-bold text-indigo-600">Kitap Pazarı - Giriş Yap</div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="block text-sm font-medium text-gray-700 mb-1">Email Adresi</label>
                        <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-6">
                        <label for="exampleInputPassword1" class="block text-sm font-medium text-gray-700 mb-1">Şifre</label>
                        <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">Giriş Yap</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('js-stack')
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                let $projects = $("form#loginForm");

                $projects.on("submit", function (e) {
                    e.preventDefault();
                    let $form = $(this);
                    let formData = new FormData($form[0]);
                    $projects.find("button[type=submit]").attr("disabled", "disabled");
                    $.ajax({
                        url: '{{ route('auth.login') }}',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function () {
                            window.location = "{{ route('home') }}";
                        },
                        error: function (e) {

                            if (e.status === 429) {
                                Swal.fire({
                                    title: "{{ __('Çok Fazla İstek!') }}",
                                    text: "{{ __('5 dakika içerisinde en fazla 3 kez talepte bulunabilirsiniz.') }}",
                                    icon: "warning",
                                    confirmButtonText: "{{ __('Kapat') }}"
                                });
                            }else if (e.status === 422){
                                Swal.fire({
                                    title: "{{ __('Hata') }}",
                                    text: e.responseJSON.message,
                                    icon: "warning",
                                    confirmButtonText: "{{ __('Kapat') }}"
                                });
                                $projects.find("button[type=submit]").removeAttr("disabled")
                            }
                            else {
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
