<div class="form-group mb-3">
    <label for="document" class="font-weight-bold dropzone-label fw-bold mb-2">{{ $title ?? 'Görseller' }}</label>
    <div class="needsclick dropzone dropzone-documents" id="document-dropzone"></div>
</div>
@push('js-stack')
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                let uploadedDocumentMap = {};
                new Dropzone('.dropzone.dropzone-documents', {
                    url: '{{ route('admin.media.store') }}',
                    maxFilesize: 500,
                    addRemoveLinks: true,
                    chunking: true,
                    parallelChunkUploads: true,
                    retryChunks: true,
                    chunkSize: 1000000,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (file, response) {
                        let inputEl = document.createElement('input');
                        inputEl.setAttribute('type', 'hidden');
                        inputEl.setAttribute('name', 'documents['+file.upload.uuid+'][filename]');
                        inputEl.setAttribute('value', response.name);

                        let inputElTitle = document.createElement('input');
                        inputElTitle.setAttribute('type', 'hidden');
                        inputElTitle.setAttribute('name', 'documents['+file.upload.uuid+'][title]');
                        inputElTitle.setAttribute('value', file.name);

                        $("#document-dropzone").parents('form')[0].append(inputEl);
                        $("#document-dropzone").parents('form')[0].append(inputElTitle);
                        uploadedDocumentMap[file.upload.uuid] = response.name;
                    },
                    removedfile: function (file) {
                        file.previewElement.remove();
                        let name = '';
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.upload.uuid]
                        }
                        $("#document-dropzone").parents('form').find('[name^="documents['+file.upload.uuid+']"]').remove();
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
