<!-- Modal -->
<div class="modal fade" id="docEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            
            <div class="modal-body">

                <form id="editDocForm" action="{{ url('update-document') }}" method="post">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="doc_id" id="doc_id">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Doc Ref. Code</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="doc_ref_code" id="doc_ref_code" class="form-control" required></br>
                        </div>
                        <div class="col-md-4">
                            <label>Document Title</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="doc_title" id="doc_title" class="form-control" required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Division</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <select type="text" name="division" id="division" class="custom-dropdown">
                                <option value="N/A">N/A</option>
                                <option value="AFD">AFD</option>
                                <option value="ORD">ORD</option>
                                <option value="TOD">TOD</option>
                            </select></br>
                        </div>
                        <div class="col-md-2">
                            <label>Project/Unit</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <select type="text" name="unit" id="unit" class="custom-dropdown" required></br>
                                <option value="N/A">N/A</option>

                                <option value="COMMS">COMMS</option>
                                <option value="QMR">QMR</option>

                                <option value="HR">HR</option>
                                <option value="Finance">Finance</option>
                                <option value="Supply">Supply</option>
                                <option value="General Services">General Services</option>
                                <option value="Records">Records</option>

                                <option value="eLGU/eGOV">eLGU/eGOV</option>
                                <option value="GovNet">GovNet</option>
                                <option value="FW4A">FW4A</option>
                                <option value="ILCD">ILCD</option>
                                <option value="IID">IID</option>
                                <option value="PNPKI">PNPKI</option>
                                <option value="DRRM">DRRM</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Owner</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="process_owner" id="process_owner" class="form-control" required></br>
                        </div><br>
                        <div class="col-md-2">
                            <label>Status</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="status" id="status" class="form-control" disabled></br>
                        </div>
                        <div class="col-md-4">
                            <label>Document Type</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <select type="text" name="doc_type" id="doc_type" class="custom-dropdown">
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
                                <option value="Other">Other</option>
                            </select></br>
                        </div>
                        <div class="col-md-2">
                            <label>Request Type</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <select type="text" name="request_type" id="request_type" class="custom-dropdown" required></br>
                                <option value="Creation">Creation</option>
                                <option value="Revision">Revision</option>
                                <option value="Deletion">Deletion</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Request Reason</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="request_reason" id="request_reason" class="form-control"></br>
                        </div>
                        <!-- <div class="col-md-2">
                            <label>Requester *</label><br>
                            <input type="text" name="requester" id="requester" class="form-control"></br>
                        </div> -->
                        <div class="col-md-2">
                            <label>Request Date</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="date" name="request_date" id="request_date" class="form-control"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Revision Number</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="revision_num" id="revision_num" class="form-control" disabled></br>
                        </div>
                        <div class="col-md-2">
                            <label>Effectivity Date</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="date" name="effectivity_date" id="effectivity_date" class="form-control"></br>
                        </div>
                        <div class="col-md-2">
                            <label>Type</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <select type="text" name="type_intext" id="type_intext" class="custom-dropdown" required></br>
                                <option value="Internal">Internal</option>
                                <option value="External">External</option>
                            </select>
                        </div>
                    </div>
                    
                </form>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="submitEditForm();">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</div>

<script>
    function submitEditForm() {
        var form = document.getElementById('editDocForm');
        if (form.checkValidity()) {
            form.submit();
        } else {
            form.reportValidity();
        }
    }
</script>


