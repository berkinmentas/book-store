@extends('admin.layouts.layout')
@section('title', __('Kurs Ekle'))
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="bg-white rounded-2 shadow p-5">
					<h4 class="fw-bold mb-4 text-primary">{{ __('Kurs Ekle') }}</h4>
					<form class="form" id="newsStore" action="javascript:">
						<div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="title" >{{ __('Kurs Adı') }}</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="{{__('Kurs Adı')}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="teacher">{{ __('Eğitmen') }}</label>
                                    <select class="form-select input-tags" multiple  id="teacher" name="teacher[]">
                                        <option value="">{{ __('Seçiniz') }}</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="group" >{{ __('Grup') }}</label>
                                    <input type="text" id="group" name="group" class="form-control" placeholder="{{__('Grup')}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="category" >{{ __('Kategori') }}</label>
                                    <input type="text" id="category" name="category" class="form-control" placeholder="{{__('Kategori')}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="number_of_lesson" >{{ __('Ders Sayısı') }}</label>
                                    <input type="text" id="number_of_lesson" name="number_of_lesson" class="form-control" placeholder="{{__('Ders Sayısı')}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="total_lesson_time" >{{ __('Ders Saati') }}</label>
                                    <input type="text" id="total_lesson_time" name="total_lesson_time" class="form-control" placeholder="{{__('Ders Saati')}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="description" >{{ __('Açıklama') }}</label>
                                    <textarea type="text" class="form-control tinyMce" id="description" name="description" style="max-height: 80px"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="short_description" >{{ __('Kısa Açıklama') }}</label>
                                    <textarea type="text" class="form-control tinyMce" id="short_description" name="short_description" style="max-height: 80px"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="information" >{{ __('Ek Bilgi') }}</label>
                                    <textarea type="text" class="form-control tinyMce" id="information" name="information" style="max-height: 80px"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <div class="form-card-label fs-5 fw-bold">{{ __('Fotoğraf') }}</div>
                                    @include('admin.includes._dropzone-single', ['title' => '', 'count' => '-1', 'type' => 'logo', 'mimes' => ['image/jpeg', 'image/jpg', 'image/png', 'image/webp']])
                                </div>
                            </div>
						</div>
						<div class="d-flex justify-content-end p-4">
							<button type="submit" class="btn btn-primary">
                                <span class="spinner-border spinner-border-sm me-1 btn-spinner d-none" role="status"
                                      aria-hidden="true"></span>
								{{ __('Oluştur') }}
							</button>
						</div>
					</form>
				</div>
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


					setTimeout(() => {
						$.ajax({
							url: '{{ route('admin.books.store') }}',
							method: 'POST',
							data: $contractsStoreForm.serialize(),
							success: function () {
								window.location = "{{ route('admin.books.index') }}";
							},
							error: function (e) {
								$contractsStoreForm.find("button[type=submit]").removeAttr("disabled")
								ajaxDefaultErrorCallback(e);
							}
						});
					});
				});
			});
		</script>
	@endpush
@endsection
