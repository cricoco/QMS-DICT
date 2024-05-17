<!-- Modal -->
<div class="modal fade" id="docShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Document Reference Code:</strong> <span id="doc-ref-code"></span></p>
                            <p><strong>Document Title:</strong> <span id="doc-title"></span></p>
                            <!-- <p><strong>DMT Incharged:</strong> <span id="dmt-incharged"></span></p> -->
                            <p><strong>Division:</strong> <span id="division"></span></p>
                            <p><strong>Process Owner:</strong> <span id="process-owner"></span></p>
                            <p><strong>Status:</strong> <span id="status"></span></p>
                            <p><strong>Document Type:</strong> <span id="doc-type"></span></p>
                            <p><strong>Request Reason:</strong> <span id="req-reason"></span></p>
                    
                        </div>
                        <div class="col-md-6">
                            <p><strong>Request Type:</strong> <span id="req-type"></span></p>
                            <p><strong>Requester:</strong> <span id="requester"></span></p>
                            <p><strong>Request Date:</strong> <span id="req-date"></span></p>
                            <p><strong>Revision Number:</strong> <span id="rev-num"></span></p>
                            <p><strong>Effectivity Date:</strong> <span id="effic-date"></span></p>
                            <p><strong>File:</strong> <span id="filename"></span></p>
                            <p><strong>Created at:</strong> <span id="created-at"></span></p>

                        </div>
                    
                    </div>
                </div>


                <div class="card-body text-center">
                    <iframe id="document-iframe" width="900" height="900" src=""></iframe>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="view-history" class="btn btn-secondary" style="background-color: #FF8C00; border-color: #FF8C00;">History</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</div>
