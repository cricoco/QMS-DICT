<!-- Modal -->
<div class="modal fade" id="docEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            
            <div class="modal-body">

                <form action="{{ url('update-document') }}" method="post">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="doc_id" id="doc_id">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Doc Ref. Code *</label><br>
                            <input type="text" name="doc_ref_code" id="doc_ref_code" class="form-control"></br>
                        </div>
                        <div class="col-md-6">
                            <label>Document Title *</label><br>
                            <input type="text" name="doc_title" id="doc_title" class="form-control"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Division *</label><br>
                            <select type="text" name="division" id="division" class="form-control">
                                <option value="N/A">N/A</option>
                                <option value="AFD">AFD</option>
                                <option value="ORD">ORD</option>
                                <option value="TOD">TOD</option>
                            </select></br>
                        </div>
                        <div class="col-md-2">
                            <label>Process Owner *</label><br>
                            <input type="text" name="process_owner" id="process_owner" class="form-control"></br>
                        </div><br>
                        <div class="col-md-2">
                            <label>Status *</label><br>
                            <input type="text" name="status" id="status" class="form-control" disabled></br>
                        </div>
                        <div class="col-md-4">
                            <label>Document Type *</label><br>
                            <select type="text" name="doc_type" id="doc_type" class="form-control">
                                <option value="Quality Manual">Quality Manual</option>
                                <option value="Quality Procedure">Quality Procedure</option>
                                <option value="Quality Procedure Form">Quality Procedure Form</option>
                                <option value="Quality Policy">Quality Policy</option>
                                <option value="Operations Manual">Operations Manual</option>
                                <option value="Procedure Manual">Procedure Manual</option>
                                <option value="Special Order">Special Order</option>
                                <option value="Travel Order">Travel Order</option>
                                <option value="Memorandum">Memorandum</option>
                                <option value="Corrective Action Request Form">Corrective Action Request Form</option>
                                <option value="Form/Template">Form/Template</option>
                                <option value="Resolution">Resolution</option>
                            </select></br>
                        </div>
                        <div class="col-md-2">
                            <label>Request Type *</label><br>
                            <input type="text" name="request_type" id="request_type" class="form-control"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Request Reason *</label><br>
                            <input type="text" name="request_reason" id="request_reason" class="form-control"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Requester *</label><br>
                            <input type="text" name="requester" id="requester" class="form-control"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Request Date *</label><br>
                            <input type="date" name="request_date" id="request_date" class="form-control"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Revision Number *</label><br>
                            <input type="text" name="revision_num" id="revision_num" class="form-control" disabled></br>
                        </div>
                        <div class="col-md-2">
                            <label>Effectivity Date *</label><br>
                            <input type="date" name="effectivity_date" id="effectivity_date" class="form-control"></br>
                        </div>

                    </div>
                    <input type="submit" value="Update" class="btn btn-success">
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</div>