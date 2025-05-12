@extends('admin.layouts.layout')
@section('title', 'Kurslar')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full">
            <div class="w-full">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="flex flex-col sm:flex-row justify-between items-center p-4 gap-3">
                        <div class="flex items-center">
                            <h5 class="font-bold mr-3">{{ __('Kitaplar') }}</h5>
                            <a href="{{ route('admin.books.create') }}" class="inline-flex items-center justify-center px-3 py-2 border border-blue-600 text-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition-colors">
                                <i class="fa-regular fa-square-plus"></i>
                            </a>
                        </div>
                        <div>
                            <div class="flex items-center">
                                <div class="ml-auto">
                                    <input type="text" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 datatable-search" autocomplete="off" placeholder="{{ __('Ara...') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 pb-4">
                        <p class="text-gray-600">{{ __('Bu tabloda, kitap ögelerinizi görebilirsiniz.') }}</p>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table-datatable w-full">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__('Başlık')}}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__('Kategori')}}</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__('İşlemler')}}</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200"></tbody>
                        </table>
                    </div>
                    @push('js-stack')
                        <script>
                            window.addEventListener('DOMContentLoaded', function () {
                                let tableList = window.tableList = $('.table-datatable').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    lengthChange: false,
                                    ajax: {
                                        url: '{{ route('admin.books.datatable') }}',
                                        type: 'POST',
                                        data: function () {
                                        },
                                    },
                                    order: [[0, "asc"]],
                                    pageLength: 15,
                                    columns: [
                                        {"data": "id"},
                                        {"data": "title"},
                                        {"data": "category"},
                                        {"data": "actions"}
                                    ],
                                    columnDefs: [
                                        {targets: 'no-sort', orderable: false},
                                        {searchable: false, targets: [0, 1]}
                                    ]
                                });

                                tableList.on('preXhr', function (evt, settings) {
                                    if (settings.jqXHR) {
                                        settings.jqXHR.abort();
                                    }
                                });
                                document.querySelector('.datatable-search').addEventListener('keyup', _.debounce(function (e) {
                                    tableList.search(this.value).draw();
                                }, 300));
                            });
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
@endsection
