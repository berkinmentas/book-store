@extends('admin.layouts.layout')
@section('title', 'İletişim Mesajları')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive bg-white rounded-2 shadow datatable-table-wrapper">
					<div class="d-flex justify-content-between align-items-center mb-4 gap-3">
                        <div class="d-flex align-items-center">
                            <h5 class="fw-bold me-3">{{ __('İletişim Mesajları') }}</h5>
                        </div>
							<div>
								<div class="d-flex justify-content-between align-items-center">
									<div class="ms-auto"><input type="text" class="form-control bg-white datatable-search" autocomplete="off" placeholder="{{ __('Ara...') }}"></div>
								</div>
							</div>
					</div>
					<p>{{ __('Bu tabloda, medya haberleri ögelerinizi görebilirsiniz.') }}</p>
					<table class="table table-datatable w-100">
						<thead>
						<tr>
							<th>#</th>
							<th>{{__('Ad Soyad')}}</th>
							<th>{{__('Başlık')}}</th>
							<th>{{__('İşlemler')}}</th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
					@push('js-stack')
						<script>
							window.addEventListener('DOMContentLoaded', function () {
								let tableList = window.tableList = $('.table-datatable').DataTable({
									processing: true,
									serverSide: true,
									lengthChange: false,
									ajax: {
										url: '{{ route('admin.contacts.datatable') }}',
										type: 'POST',
										data: function () {
										},
									},
									order: [[0, "asc"]],
									pageLength: 15,
									columns: [
										{"data": "id"},
										{"data": "name"},
										{"data": "subject"},
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
