@extends('admin.layouts.base')
@section('body')
    <div class="flex h-screen overflow-hidden">
        @include('admin.layouts.sidebar')
        <div class="flex flex-col flex-1 overflow-hidden">
            @include('admin.layouts.topbar')
            <main class="flex-1 overflow-y-auto bg-gray-100 pt-16 pb-5 ms-[250px]">
                <div class="px-4 py-6 mx-auto max-w-7xl">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
@endsection
