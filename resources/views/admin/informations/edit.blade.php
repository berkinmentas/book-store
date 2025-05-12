@extends('admin.layouts.layout')
@section('title', 'Kurum Bilgileri Güncelle')
@section('content')
    <div class="container">
        <div class="row row-sm mt-4">
            <div class="col-lg-12">
                <form id="informationUpdate">
                    <div class="bg-white rounded-2 shadow p-5">
                            <h3 class="card-title fw-bold text-primary mb-4">Kurum Bilgilerini Güncelle</h3>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="address" >{{ __('Adres') }}</label>
                                    <input type="text" id="address" name="address" class="form-control" value="{{$information->address}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="location_url" >{{ __('Konum Bağlanısı') }}</label>
                                    <input type="text" id="location_url" name="location_url" class="form-control" value="{{$information->location_url}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="phone" >{{ __('Telefon Numarası') }}</label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{$information->phone}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="email" >{{ __('E-Posta') }}</label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{$information->email}}">
                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-end p-4">
                            <button type="submit" class="btn btn-primary">
                                <span class="spinner-border spinner-border-sm me-1 btn-spinner d-none" role="status"
                                      aria-hidden="true"></span>
                                {{ __('Güncelle') }}
                            </button>
                        </div>
                    </div>
                </form>
                @push('js-stack')
                    <script>
                        window.addEventListener('DOMContentLoaded', () => {
                            let $informationUpdateForm = $("form#informationUpdate");
                            $informationUpdateForm.on("submit", function (e) {
                                e.preventDefault();
                                $informationUpdateForm.find("button[type=submit]").attr("disabled", "disabled");
                                $.ajax({
                                    url: '{{ route('admin.informations.update', ['information' => $information->id]) }}',
                                    method: 'PUT',
                                    data: $informationUpdateForm.serialize(),
                                    success: function () {
                                        window.location = "{{ route('admin.informations.edit', ['information' => $information->id]) }}";
                                    },
                                    error: function (e) {
                                        $informationUpdateForm.find("button[type=submit]").removeAttr("disabled")
                                        ajaxDefaultErrorCallback(e);
                                    }
                                });
                            });
                        });
                    </script>
                @endpush
            </div>
        </div>
    </div>
@endsection
