@extends('admin.layouts.layout')
@section('title', 'İletişim Mesajı')
@section('content')
    <div class="container">
        <div class="row row-sm mt-4">
            <div class="col-lg-12">
                <form id="settingUpdate">
                    <div class="card custom-card shadow mb-3">
                        <div class="card-header border-bottom">
                            <h3 class="card-title fw-bold text-primary mb-0">İletişim Mesajı</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if($contact->name)
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="fs-5 fw-bold my-3">{{ __('Ad Soyad') }}</label>
                                            <input disabled type="text" class="form-control" id="name" name="name"
                                                   value="{{$contact->name}}">
                                        </div>
                                    </div>
                                @endif
                                @if($contact->email)
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="fs-5 fw-bold my-3">{{ __('Email') }}</label>
                                            <input disabled type="text" class="form-control" id="email" name="email"
                                                   value="{{$contact->email}}">
                                        </div>
                                    </div>
                                @endif
                                @if($contact->phone)
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="phone"
                                                   class="fs-5 fw-bold my-3">{{ __('Telefon Numarası') }}</label>
                                            <input disabled type="text" class="form-control" id="phone" name="phone"
                                                   value="{{$contact->phone}}">
                                        </div>
                                    </div>
                                @endif
                                @if($contact->subject)
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="subject" class="fs-5 fw-bold my-3">{{ __('Konu') }}</label>
                                            <input disabled type="text" class="form-control" id="subject" name="subject"
                                                   value="{{$contact->subject}}">
                                        </div>
                                    </div>
                                @endif
                                @if($contact->message)
                                    <div class="mb-3">
                                        <label for="message" class="fs-5 fw-bold my-3">{{ __('İçerik') }}</label>
                                        <textarea disabled type="text" class="form-control" id="message" name="message"
                                                  style="max-height: 200px">{!! $contact->message !!}</textarea>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
