<!-- Modal -->
<div class="modal fade" id="csvCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('documents.upload') }}" method="POST" enctype="multipart/form-data"
                    id="uploadForm">
                    @csrf
                    <div class="mb-3">
                        <label for="csv_file" class="form-label">Upload Document List (.csv):</label>
                        <input type="file" name="csv_file" id="csv_file" class="form-control" accept=".csv">
                    </div>
                    <div class="mb-3">
                        <label for="document_files" class="form-label">Upload Files (.doc, .docx, .xls, .xlsx,
                            .pdf):</label>
                        <input type="file" name="document_files[]" id="document_files" class="form-control" multiple
                            accept=".doc,.docx,.xls,.xlsx,.pdf">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="uploadForm" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</div>
