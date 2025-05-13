@extends('admin.layouts.layout')
@section('title', 'Kurslar')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden p-4">
            <div class="flex flex-col sm:flex-row justify-between items-center p-4 gap-4">
                <div class="flex items-center gap-3">
                    <h5 class="text-xl font-semibold text-gray-800">{{ __('Kitaplar') }}</h5>
                    <a href="{{ route('admin.books.create') }}"
                       class="inline-flex items-center justify-center px-3 py-2 border border-blue-600 text-blue-600 rounded-md hover:bg-blue-600 hover:text-white transition">
                        <i class="fa-regular fa-square-plus mr-1"></i> <span>Ekle</span>
                    </a>
                </div>
            </div>

            <div class="px-4 pb-4 text-sm text-gray-600">
                {{ __('Bu tabloda, kitap ögelerinizi görebilirsiniz.') }}
            </div>

            <div class="overflow-x-auto">
                <table class="table-datatable min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Başlık') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('Kategori') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">{{ __('İşlemler') }}</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-sm"></tbody>
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
                                data: function () {},
                            },
                            order: [[0, "asc"]],
                            pageLength: 15,
                            columns: [
                                { data: "id" },
                                { data: "title" },
                                { data: "category" },
                                { data: "actions" }
                            ],
                            columnDefs: [
                                { targets: 'no-sort', orderable: false },
                                { searchable: true, targets: [0, 1] }
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
@endsection
