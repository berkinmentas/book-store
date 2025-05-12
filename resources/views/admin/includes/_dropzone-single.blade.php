<div class="form-group mb-3">
    <label for="file" class="font-weight-bold">{{ $title ?? 'Görsel' }}</label>
    <div class="needsclick dropzone dropzone-single" id="file-dropzone{{ $count ?? '' }}"></div>
</div>
@push('js-stack')
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                let uploadedDocumentMap = {};
                new Dropzone("#file-dropzone{{ $count ?? '' }}", {
                    url: '{{ route('admin.media.store') }}',
                    maxFilesize: 500,
                    maxFiles: 1,
                    acceptedFiles: {!! isset($mimes) ? '"'.implode(",",$mimes).'"' : 'null' !!},
                    addRemoveLinks: true,
                    chunking: true,
                    parallelChunkUploads: true,
                    retryChunks: true,
                    chunkSize: 1000000,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    init: function () {
                        this.on("addedfile", function (file) {
                            if (this.files.length === 2) {
                                this.removeFile(this.files[0]);
                                if (this.files.length > 1) {
                                    this.files = this.files.slice(1, 2);
                                }
                            }
                        });
                    },
                    error: function (file, response) {
                        file.previewElement.remove();

                        $("#file-dropzone{{ $count ?? '' }}").parents('form').find('[name="{{ $type ?? 'file' }}[0][title]"]').remove();
                        $("#file-dropzone{{ $count ?? '' }}").parents('form').find('[name="{{ $type ?? 'file' }}[0][filename]"]').remove();
                        ajaxDefaultErrorCallback({responseJSON: response??'Error'})
                    },
                    success: function (file, response) {
                        let inputEl = document.createElement('input');
                        inputEl.setAttribute('type', 'hidden');
                        inputEl.setAttribute('name', '{{ $type ?? 'file' }}[0][filename]');
                        inputEl.setAttribute('value', response.name);

                        let inputElTitle = document.createElement('input');
                        inputElTitle.setAttribute('type', 'hidden');
                        inputElTitle.setAttribute('name', '{{ $type ?? 'file' }}[0][title]');
                        inputElTitle.setAttribute('value', file.name);

                        $("#file-dropzone{{ $count ?? '' }}").parents('form')[0].append(inputEl);
                        $("#file-dropzone{{ $count ?? '' }}").parents('form')[0].append(inputElTitle);
                        uploadedDocumentMap[file.upload.uuid] = response.name;
                    },
                    removedfile: function (file) {
                        file.previewElement.remove();

                        $("#file-dropzone{{ $count ?? '' }}").parents('form').find('[name="{{ $type ?? 'file' }}[0][title]"]').remove();
                        $("#file-dropzone{{ $count ?? '' }}").parents('form').find('[name="{{ $type ?? 'file' }}[0][filename]"]').remove();
                    },
                    addedfiles: function () {
                        dropzoneAddedFilesEventHandler()
                    },
                    queuecomplete: function () {
                        dropzoneQueueCompleteEventHandler()
                    }
                });
            });
        });
    </script>
@endpush
