<!-- Modal -->
<div class="modal fade" id="docCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Autofill
                    </button>
                    <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
                        <input type="text" id="searchInput" onkeyup="filterDropdown()" placeholder="Search...">
                        @foreach($availableDocuments as $document)
                            <a class="dropdown-item" href="#" onclick="loadDetails('{{ $document->doc_ref_code }}')">Load {{ $document->doc_ref_code }}</a>
                        @endforeach
                    </div>
                </div>
                <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 30px">Create New Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="createDocForm" action="{{ url('document') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-2">
                            <label>Doc Ref. Code *</label><br>
                            <input type="text" name="doc_ref_code" id="doc_ref_code" class="form-control" required></br>
                        </div>
                        <div class="col-md-4">
                            <label>Document Title *</label><br>
                            <input type="text" name="doc_title" id="doc_title" class="form-control" required></br>
                        </div>
                        <!-- <div class="col-md-2">
          <label>DMT Incharged *</label><br>
          <input type="text" name="dmt_incharged" id="dmt_incharged" class="form-control"></br>
        </div> -->
                        <div class="col-md-2">
                            <label>Division *</label><br>
                            <select name="division" id="division" class="custom-dropdown" required></br>
                                <option value="N/A">N/A</option>
                                <option value="AFD">AFD</option>
                                <option value="ORD">ORD</option>
                                <option value="TOD">TOD</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Project/Unit *</label><br>
                            <select name="unit" id="unit" class="custom-dropdown" required></br>
                                <option value="N/A">N/A</option>

                                <option value="COMMS">COMMS</option>
                                <option value="QMR">QMR</option>

                                <option value="HR">HR</option>
                                <option value="Finance">Finance</option>
                                <option value="Supply">Supply</option>
                                <option value="General Services">General Services</option>
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
                            <label>Owner *</label><br>
                            <input type="text" name="process_owner" id="process_owner" class="form-control" required></br>
                        </div><br>
                        <div class="col-md-2">
                            <label>Status *</label><br>
                            <input type="text" name="status" id="status" value="Active" class="form-control" disabled required></br>
                        </div>
                        <div class="col-md-4">
                            <label>Document Type *</label><br>
                            <select name="doc_type" id="doc_type" class="custom-dropdown" required></br>
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
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Request Type *</label><br>
                            <select name="request_type" id="request_type" class="custom-dropdown" required></br>
                                <option value="Creation">Creation</option>
                                <option value="Revision">Revision</option>
                                <option value="Deletion">Deletion</option>
                                
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Request Reason *</label><br>
                            <input type="text" name="request_reason" id="request_reason" class="form-control" required></br>
                        </div>
                        <!-- <div class="col-md-2">
                            <label>Requester *</label><br>
                            <input type="text" name="requester" id="requester" class="form-control" required></br>
                        </div> -->
                        <div class="col-md-2">
                            <label>Request Date *</label><br>
                            <input type="date" name="request_date" id="request_date" class="form-control" required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Revision Number *</label><br>
                            <input type="text" name="revision_num" id="revision_num" value="0" class="form-control" disabled required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Effectivity Date *</label><br>
                            <input type="date" name="effectivity_date" id="effectivity_date" class="form-control" required></br>
                        </div>
                        <div class="col-md-4">
                            <label>File *</label><br>
                            <input type="file" name="file" id="file" class="form-control" required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Type *</label><br>
                            <select name="type_intext" id="type_intext" class="custom-dropdown" required></br>
                                <option value="Internal">Internal</option>
                                <option value="External">External</option>
                            </select>
                        </div>
                    </div>
                    
                </form>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success" onclick="submitCreateForm();">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

</div>
<style>
    #searchInput {
        margin-bottom: 5px;
        padding: 5px;
        width: 100%;
        box-sizing: border-box;
    }

    .dropdown-content.dropdown-menu.dropdown-menu-right {
        left: auto;
        right: 0;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        max-height: 200px;
        overflow-y: auto;

    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-item {
        display: block;
        margin-bottom: 5px;
        /* Adjust spacing between items */
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
    
    .custom-dropdown {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
</style>
<script>
    function filterDropdown() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        div = document.getElementsByClassName('dropdown-content')[0];
        a = div.getElementsByTagName('a');
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = '';
            } else {
                a[i].style.display = 'none';
            }
        }
    }



    function loadDetails(docRefCode) {
        $.ajax({
            url: '/documentxx/' + docRefCode, // Adjust URL if necessary
            method: 'GET',
            success: function(data) {
                console.log(data);
                if(data) {
                    $('#docCreateModal #doc_ref_code').val(data.doc_ref_code);
                    $('#docCreateModal #doc_title').val(data.doc_title);
                    $('#docCreateModal #division').val(data.division);
                    $('#docCreateModal #process_owner').val(data.process_owner);
                    $('#docCreateModal #doc_type').val(data.doc_type);
                    $('#docCreateModal #request_type').val(data.request_type);
                    $('#docCreateModal #requester').val(data.requester);
                    $('#docCreateModal #request_date').val(data.request_date);
                    $('#docCreateModal #type_intext').val(data.type_intext);
                    $('#docCreateModal #unit').val(data.unit);
                }
            },
            error: function(err) {
                console.error(err);
            }
        });
    }

    function submitCreateForm() {
        var form = document.getElementById('createDocForm');
        if (form.checkValidity()) {
            var docRefCode = $('#doc_ref_code').val();
            $.ajax({
                url: '{{ route("document.check") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    doc_ref_code: docRefCode
                },
                success: function(response) {
                    if (response.exists) {
                        if (confirm('A document with this reference code already exists. Proceeding will render the existing document obsolete and increment the revision number of this document. Do you still wish to proceed?')) {
                            form.submit(); // Submit the form if the user confirms
                        }
                    } else {
                        form.submit(); // No existing document, submit the form
                    }
                },
                error: function() {
                    alert('An error occurred while checking the document reference code.');
                }
            });
        } else {
            form.reportValidity();
        }
    }
</script>