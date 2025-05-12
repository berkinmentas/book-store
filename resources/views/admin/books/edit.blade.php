@extends('admin.layouts.layout')
@section('title', 'Kurs Güncelle')
@section('content')
    <div class="container">
        <div class="row row-sm mt-4">
            <div class="col-lg-12">
                <form id="courseUpdate">
                    <div class="bg-white rounded-2 shadow p-5">
                            <h3 class="card-title fw-bold text-primary mb-4">Kurs Güncelle</h3>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="title" >{{ __('Kurs Adı') }}</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{$course->title}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="teacher">{{ __('Eğitmen') }}</label>
                                    <select class="form-select input-tags" multiple id="teacher" name="teacher[]">
                                        @if(!empty($course->teachers))
                                            @foreach($teachers as $teacher)
                                                @php
                                                    $isSelected = false;
                                                    foreach ($course->teachers as $selectedTeacher) {
                                                        if ($selectedTeacher['id'] === $teacher->id) {
                                                            $isSelected = true;
                                                            break;
                                                        }
                                                    }
                                                @endphp
                                                <option
                                                    {{ $isSelected ? 'selected' : '' }} value="{{ $teacher->id }}">{{$teacher->name}}
                                                </option>
                                            @endforeach
                                        @else
                                            @foreach($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{$teacher->name}}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="group" >{{ __('Grup') }}</label>
                                    <input type="text" id="group" name="group" class="form-control" value="{{$course->group}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="category" >{{ __('Kategori') }}</label>
                                    <input type="text" id="category" name="category" class="form-control" value="{{$course->category}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="number_of_lesson" >{{ __('Ders Sayısı') }}</label>
                                    <input type="text" id="number_of_lesson" name="number_of_lesson" class="form-control" value="{{$course->number_of_lesson}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="total_lesson_time" >{{ __('Ders Saati') }}</label>
                                    <input type="text" id="total_lesson_time" name="total_lesson_time" class="form-control" value="{{$course->total_lesson_time}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="description" >{{ __('Açıklama') }}</label>
                                    <textarea type="text" class="form-control tinyMce" id="description" name="description" style="max-height: 80px">{{$course->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="short_description" >{{ __('Kısa Açıklama') }}</label>
                                    <textarea type="text" class="form-control tinyMce" id="short_description" name="short_description" style="max-height: 80px">{{$course->short_description}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="mb-3">
                                    <label class="mb-3 fs-5 fw-bold" for="information" >{{ __('Ek Bilgi') }}</label>
                                    <textarea type="text" class="form-control tinyMce" id="information" name="information" style="max-height: 80px">{{$course->short_description}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                @include('admin.includes._dropzone-single', ['title' => '', 'count' => '-1', 'type' => 'logo', 'mimes' => ['image/jpeg', 'image/jpg', 'image/png', 'image/webp']])
                                @if(!empty($course->getMedia('logo')) && count($course->getMedia('logo')) > 0)
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3 col-lg-2">
                                                <div class="gallery-image mb-3">
                                                    <img src="{{ $course->getFirstMediaUrl('logo') }}"
                                                         alt="Logo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
                            let $courseUpdateForm = $("form#courseUpdate");
                            $courseUpdateForm.on("submit", function (e) {
                                e.preventDefault();
                                $courseUpdateForm.find("button[type=submit]").attr("disabled", "disabled");
                                $.ajax({
                                    url: '{{ route('admin.books.update', ['course' => $course->id]) }}',
                                    method: 'PUT',
                                    data: $courseUpdateForm.serialize(),
                                    success: function () {
                                        window.location = "{{ route('admin.books.edit', ['course' => $course->id]) }}";
                                    },
                                    error: function (e) {
                                        $courseUpdateForm.find("button[type=submit]").removeAttr("disabled")
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
