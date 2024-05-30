<!-- Modal -->
<div class="modal fade" id="docCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Create New Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="createDocForm" action="{{ url('document') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-2">
                            <label>Doc Ref. Code</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="doc_ref_code" id="doc_ref_code" class="form-control" list="docRefCodes" required oninput="handleDocRefCodeInput(this.value)"><br>
                            <datalist id="docRefCodes">
                                @foreach($availableDocuments as $document)
                                <option value="{{ $document->doc_ref_code }}">{{ $document->doc_ref_code }}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-md-4">
                            <label>Document Title</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="doc_title" id="doc_title" class="form-control" required></br>
                        </div>
                        <!-- <div class="col-md-2">
          <label>DMT Incharged *</label><br>
          <input type="text" name="dmt_incharged" id="dmt_incharged" class="form-control"></br>
        </div> -->
                        <div class="col-md-2">
                            <label>Division</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <select name="division" id="divisioncreatemodal" class="custom-dropdown" required onchange="updateUnitDropdown()"></br>
                                <option value="N/A">N/A</option>
                                <option value="AFD">AFD</option>
                                <option value="ORD">ORD</option>
                                <option value="TOD">TOD</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Project/Unit</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <select name="unit" id="unit" class="custom-dropdown" required></br>
                                <option value="N/A">N/A</option>

                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Owner</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="process_owner" id="process_owner" class="form-control" required></br>
                        </div><br>
                        <div class="col-md-2">
                            <label>Status</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="status" id="status" value="Active" class="form-control" disabled required></br>
                        </div>
                        <div class="col-md-4">
                            <label>Document Type</label><span style="color: red; margin-left: 5px;">*</span><br>
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
                            <label>Request Type</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <select name="request_type" id="request_type" class="custom-dropdown" required></br>
                                <option value="Creation">Creation</option>
                                <option value="Revision">Revision</option>
                                <option value="Deletion">Deletion</option>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Request Reason</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="request_reason" id="request_reason" class="form-control" required></br>
                        </div>
                        <!-- <div class="col-md-2">
                            <label>Requester *</label><br>
                            <input type="text" name="requester" id="requester" class="form-control" required></br>
                        </div> -->
                        <div class="col-md-2">
                            <label>Request Date</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="date" name="request_date" id="request_date" class="form-control" required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Revision Number</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="text" name="revision_num" id="revision_num" value="0" class="form-control" disabled required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Effectivity Date</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="date" name="effectivity_date" id="effectivity_date" class="form-control" required></br>
                        </div>
                        <div class="col-md-4">
                            <label>File</label><span style="color: red; margin-left: 5px;">*</span><br>
                            <input type="file" name="file" id="file" class="form-control" required></br>
                        </div>
                        <div class="col-md-2">
                            <label>Type</label><span style="color: red; margin-left: 5px;">*</span><br>
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
    document.addEventListener('DOMContentLoaded', function() {
        var docRefCodeInput = document.getElementById('doc_ref_code');
        var typingTimer;

        docRefCodeInput.addEventListener('input', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(function() {
                handleDocRefCodeInput(docRefCodeInput.value);
            }, 500); // Adjust the delay as needed (in milliseconds)
        });
    });

    function handleDocRefCodeInput(value) {
        var exactMatch = false;
        var datalist = document.getElementById('docRefCodes');
        var options = datalist.querySelectorAll('option');
        options.forEach(function(option) {
            if (option.value === value) {
                exactMatch = true;
                return;
            }
        });
        if (exactMatch) {
            loadDetails(value);
        }
    }

    function loadDetails(docRefCode) {
        $.ajax({
            url: '/documentxx/' + docRefCode, // Adjust URL if necessary
            method: 'GET',
            success: function(data) {
                console.log(data);
                if (data) {
                    $('#docCreateModal #doc_ref_code').val(data.doc_ref_code);
                    $('#docCreateModal #doc_title').val(data.doc_title);
                    $('#docCreateModal #divisioncreatemodal').val(data.division);
                    $('#docCreateModal #process_owner').val(data.process_owner);
                    $('#docCreateModal #doc_type').val(data.doc_type);
                    $('#docCreateModal #request_type').val(data.request_type);
                    $('#docCreateModal #requester').val(data.requester);
                    $('#docCreateModal #request_date').val(data.request_date);
                    $('#docCreateModal #type_intext').val(data.type_intext);

                    updateUnitDropdown();
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
        var divisionDropdown = document.getElementById('divisioncreatemodal');
        var unitDropdown = document.getElementById('unit');
        var divisionValue = divisionDropdown.value;
        var unitValue = unitDropdown.value;

        if (form.checkValidity()) {
            // Check if both division and unit are set to "N/A"
            if (divisionValue === 'N/A' && unitValue === 'N/A') {
                alert('Division and Project/Unit cannot be N/A.');
                // Stop the submission process and allow the user to fill out the division field
                divisionDropdown.focus();
                return;
            }
            // Check if only division is set to "N/A"
            else if (divisionValue === 'N/A') {
                alert('Division and Project/Unit cannot be N/A.');
                // Stop the submission process and allow the user to fill out the division field
                divisionDropdown.focus();
                return;
            }

            // Proceed with the submission
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



    function updateUnitDropdown() {
        var divisionDropdown = document.getElementById('divisioncreatemodal');
        var division = divisionDropdown.value;
        var unitDropdown = document.getElementById('unit');

        // Clear existing options
        unitDropdown.innerHTML = '';

        // Add options based on division
        if (division === 'AFD') {
            addOption(unitDropdown, 'HR', 'HR');
            addOption(unitDropdown, 'Finance', 'Finance');
            addOption(unitDropdown, 'Supply', 'Supply');
            addOption(unitDropdown, 'General Services', 'General Services');
            addOption(unitDropdown, 'Records', 'Records');
        } else if (division === 'ORD') {
            addOption(unitDropdown, 'COMMS', 'COMMS');
            addOption(unitDropdown, 'QMR', 'QMR');
        } else if (division === 'TOD') {
            addOption(unitDropdown, 'eLGU/eGOV', 'eLGU/eGOV');
            addOption(unitDropdown, 'GovNet', 'GovNet');
            addOption(unitDropdown, 'FW4A', 'FW4A');
            addOption(unitDropdown, 'ILCD', 'ILCD');
            addOption(unitDropdown, 'IID', 'IID');
            addOption(unitDropdown, 'PNPKI', 'PNPKI');
            addOption(unitDropdown, 'DRRM', 'DRRM');
        }
    }

    function addOption(selectElement, value, text) {
        var option = document.createElement('option');
        option.value = value;
        option.text = text;
        selectElement.appendChild(option);
    }
</script>